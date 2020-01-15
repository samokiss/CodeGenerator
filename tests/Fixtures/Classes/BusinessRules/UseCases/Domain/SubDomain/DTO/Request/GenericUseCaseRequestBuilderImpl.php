<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GenericUseCaseRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GenericUseCaseRequestBuilder;

class GenericUseCaseRequestBuilderImpl implements GenericUseCaseRequestBuilder
{
    /**
     * @var GenericUseCaseRequestDTO
     */
    private $request;

    public function build(): GenericUseCaseRequest
    {
        return $this->request;
    }

    public function create(): GenericUseCaseRequestBuilder
    {
        $this->request = new GenericUseCaseRequestDTO();

        return $this;
    }
}
