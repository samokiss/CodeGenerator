<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface ViewModelDetailStubGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelDetailStubGeneratorRequest;

    public function create(): ViewModelDetailStubGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelDetailStubGeneratorRequestBuilder;
}
