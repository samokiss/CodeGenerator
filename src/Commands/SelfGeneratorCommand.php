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
class SelfGeneratorCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected static $defaultName = 'code-generator:generate-generator';

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->container = new ContainerBuilder();
        $loader = new XmlFileLoader($this->container, new FileLocator(self::CONFIG_DIR));
        $loader->load('self_generator.xml');
        $this->loadConfigParameters();
        $this->container->compile();
    }

    protected function configure()
    {
        $this
            ->setName(self::$defaultName)
            ->setDescription('Create needed classes to add new generator')
            ->setHelp('This command allows you to create new generator')
            ->addArgument(Args::DOMAIN, InputArgument::OPTIONAL, 'set Domain/SubDomain')
            ->addArgument(Args::ENTITY, InputArgument::OPTIONAL, 'set Entity name');
        $this->configureOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codeGeneratorConfig = Yaml::parseFile($this->getConfigFile());

        $this->checkConfiguration($codeGeneratorConfig);

        $this->checkInputArgument($input, $output, Args::ENTITY);

        $fileObjects = $this->container
            ->get('open_classrooms.code_generator.mediators.self_generator.self_generator_mediator')
            ->mediate($input->getArguments(), $input->getOptions());

        $io = new SymfonyStyle($input, $output);

        [$writtenFiles, $notWrittenFiles] = $this->getFilesWritingStatus($fileObjects);

        $this->displayCreatedFilePath($io, $writtenFiles);
        $this->displayNotWrittenFilePathAndContent($io, $notWrittenFiles, $input);
        $this->displayFilePathAndContentDump($io, array_merge($writtenFiles, $notWrittenFiles), $input);
    }
}
