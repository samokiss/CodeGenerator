<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain;

use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

interface EditFunctionalEntityRequestBuilder extends UseCaseRequest
{
    public function build(): EditFunctionalEntityRequest;

    public function create(): EditFunctionalEntityRequestBuilder;

    public function withField1(string $field1): EditFunctionalEntityRequestBuilder;

    public function withField2(array $field2): EditFunctionalEntityRequestBuilder;

    public function withField3(bool $field3): EditFunctionalEntityRequestBuilder;

    public function withField4(\DateTimeInterface $field4): EditFunctionalEntityRequestBuilder;
}
