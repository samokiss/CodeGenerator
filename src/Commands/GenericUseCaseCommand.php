<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:generic-use-case';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('generic_use_case_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create generic use case architecture')
            ->setHelp('This command allows you to create generic use case architecture')
            ->addArgument(Args::DOMAIN, InputArgument::OPTIONAL, 'set Domain/SubDomain')
            ->addArgument(Args::USE_CASE, InputArgument::OPTIONAL, 'set UseCase name');
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = Yaml::parseFile(static::ROOT_DIR . '/' . static::CONFIG_FILE);

        $this->checkConfiguration($codeGeneratorConfig);

        $this->checkInputArgument($input, $output);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.business_rules.impl.use_case_mediator_impl')
            ->mediate($input->getArguments(), $input->getOptions());

        $io = new SymfonyStyle($input, $output);

        [$writtenFiles, $notWrittenFiles] = $this->getFilesWritingStatus($fileObjects);

        $this->displayCreatedFilePath($io, $writtenFiles);
        $this->displayNotWrittenFilePathAndContent($io, $notWrittenFiles, $input);
        $this->displayFilePathAndContentDump($io, array_merge($writtenFiles, $notWrittenFiles), $input);

    }

    protected function checkInputArgument(InputInterface $input, OutputInterface $output): void
    {
        if (null === $input->getArgument(Args::DOMAIN) || null === $input->getArgument(Args::USE_CASE)) {
            $helper = $this->getHelper('question');
            $domainQuestion = new Question('Please enter domain folders (ex: Domain\Subdomain): ', 'Domain\Subdomain');
            $useCaseQuestion = new Question('Please enter the class short name of the useCase: ', 'UseCase');

            $input->setArgument(Args::DOMAIN, $helper->ask($input, $output, $domainQuestion));
            $input->setArgument(Args::USE_CASE, $helper->ask($input, $output, $useCaseQuestion));
        }
    }
}