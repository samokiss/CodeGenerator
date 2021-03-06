<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface UseCaseDetailResponseAssemblerGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): UseCaseDetailResponseAssemblerGeneratorRequest;

    public function create(): UseCaseDetailResponseAssemblerGeneratorRequestBuilder;

    public function withEntityClassName(
        string $entity
    ): UseCaseDetailResponseAssemblerGeneratorRequestBuilder;
}
