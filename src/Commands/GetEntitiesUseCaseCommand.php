<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Args;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:get-entities-use-case';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('get_entities_use_case_services.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create get entities use case architecture')
            ->setHelp('This command allows you to create get entities use case architecture')
            ->addArgument(Args::CLASS_NAME, InputArgument::OPTIONAL, 'set entities class name');
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = Yaml::parseFile($this->getConfigFile());

        $this->checkConfiguration($codeGeneratorConfig);

        $this->checkInputClassNameArgument($input, $output, Args::CLASS_NAME);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.business_rules.use_cases.get_entities_use_case_mediator')
            ->mediate($input->getArguments(), $input->getOptions());

        $io = new SymfonyStyle($input, $output);

        [$writtenFiles, $notWrittenFiles] = $this->getFilesWritingStatus($fileObjects);

        $this->displayCreatedFilePath($io, $writtenFiles);
        $this->displayNotWrittenFilePathAndContent($io, $notWrittenFiles, $input);
        $this->displayFilePathAndContentDump($io, array_merge($writtenFiles, $notWrittenFiles), $input);
    }
}