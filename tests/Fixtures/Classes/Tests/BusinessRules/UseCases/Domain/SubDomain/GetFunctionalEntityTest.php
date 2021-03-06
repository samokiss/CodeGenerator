<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\GetFunctionalEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GetFunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Gateways\Domain\SubDomain\InMemoryFunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssemblerMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseTestCase;
use PHPUnit\Framework\TestCase;

class GetFunctionalEntityTest extends TestCase
{
    use FunctionalEntityDetailResponseTestCase;

    /**
     * @var GetFunctionalEntityRequestDTO
     */
    private $request;

    /**
     * @var GetFunctionalEntity
     */
    private $useCase;

    /**
     * @test
     *
     * @expectedException \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    final public function functionalEntityNotFoundShouldThrowException(): void
    {
        $this->request->id = -1;
        $this->useCase->execute($this->request);
    }

    /**
     * @test
     */
    final public function getFunctionalEntityShouldReturnResponse(): void
    {
        $response = $this->useCase->execute($this->request);

        $this->assertFunctionalEntityDetailResponse(new FunctionalEntityDetailResponseStub1(), $response);

        $this->fail("TODO: configure stub");
    }

    protected function setup(): void
    {
        $this->useCase = new GetFunctionalEntity(
            new FunctionalEntityDetailResponseAssemblerMock(),
            new InMemoryFunctionalEntityGateway([FunctionalEntityStub1::ID => new FunctionalEntityStub1()])
        );
        $this->request = $this->buildRequest();
    }

    private function buildRequest(): GetFunctionalEntityRequest
    {
        $builder = new GetFunctionalEntityRequestBuilderImpl();

        return $builder
            ->create()
            ->withFunctionalEntityId(FunctionalEntityStub1::ID)
            ->build();
    }
}
