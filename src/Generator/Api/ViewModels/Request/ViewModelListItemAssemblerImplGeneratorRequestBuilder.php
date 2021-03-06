<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface ViewModelListItemAssemblerImplGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): ViewModelListItemAssemblerImplGeneratorRequest;

    public function create(): ViewModelListItemAssemblerImplGeneratorRequestBuilder;

    public function withClassName(string $className): ViewModelListItemAssemblerImplGeneratorRequestBuilder;
}
