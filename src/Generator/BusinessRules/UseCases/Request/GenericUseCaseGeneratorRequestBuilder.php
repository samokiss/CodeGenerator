<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface GenericUseCaseGeneratorRequestBuilder extends GeneratorRequest
{
    public function build(): GenericUseCaseGeneratorRequest;

    public function create(): GenericUseCaseGeneratorRequestBuilder;

    public function withDomain(
        string $domain
    ): GenericUseCaseGeneratorRequestBuilder;

    public function withUseCaseName(
        string $useCaseName
    ): GenericUseCaseGeneratorRequestBuilder;
}
