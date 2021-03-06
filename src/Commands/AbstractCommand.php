<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Commands;

use OpenClassrooms\CodeGenerator\Mediators\Options;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;

class AbstractCommand extends Command
{
    use CheckCommandArgumentTrait;
    use CommandDisplayTrait;

    const CONFIG_DIR            = __DIR__ . '/../Resources/config';

    const CONFIG_FILE           = self::ROOT_DIR . 'oc_code_generator.yml';

    const CONFIG_FILE_GENERATOR = self::ROOT_DIR_GENERATOR . 'oc_code_generator.yml';

    const ROOT_DIR              = __DIR__ . '/../../../../../';

    const ROOT_DIR_GENERATOR    = __DIR__ . '/../../';

    /**
     * @var ContainerBuilder
     */
    protected $container;

    protected function configureOptions()
    {
        $this->addOption(
            Options::NO_TEST,
            null,
            InputOption::VALUE_NONE,
            'Without test'
        )
            ->addOption(
                Options::TESTS_ONLY,
                null,
                InputOption::VALUE_NONE,
                'Only test'
            )
            ->addOption(
                Options::DUMP,
                null,
                InputOption::VALUE_NONE,
                'Dump'
            );
    }

    protected function loadConfigParameters()
    {
        if (empty($config)) {
            if (\is_file(static::CONFIG_FILE)) {
                $this->loadConfigFile(static::ROOT_DIR, static::CONFIG_FILE);
            } else {
                $this->loadConfigFile(static::ROOT_DIR_GENERATOR, static::CONFIG_FILE_GENERATOR);
            }
        }
    }

    private function loadConfigFile(string $rootDir, string $configFile): void
    {
        $loader = new YamlFileLoader($this->container, new FileLocator($rootDir));
        $loader->load($configFile);
    }

    protected function parseConfigFile(): array
    {
        return Yaml::parseFile($this->getConfigFile());
    }

    private function getConfigFile()
    {
        if (\is_file(static::CONFIG_FILE)) {
            return static::CONFIG_FILE;
        }

        return static::CONFIG_FILE_GENERATOR;
    }
}
