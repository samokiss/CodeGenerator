<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Commands;

use OpenClassrooms\CodeGenerator\Commands\ViewModelCommand;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelCommandMock extends ViewModelCommand
{
    const CONFIG_FILE = 'oc_code_generator_test.yml.dist';

    const ROOT_DIR = __DIR__ . '/../../';
}
