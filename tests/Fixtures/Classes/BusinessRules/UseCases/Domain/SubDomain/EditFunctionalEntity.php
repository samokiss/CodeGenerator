<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseAssembler;
use OpenClassrooms\UseCase\Application\Annotations\Transaction;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

class EditFunctionalEntity implements UseCase
{
    /**
     * @var FunctionalEntityGateway
     */
    private $functionalEntityGateway;

    /**
     * @var FunctionalEntityDetailResponseAssembler
     */
    private $responseAssembler;

    public function __construct(
        FunctionalEntityGateway $functionalEntityGateway,
        FunctionalEntityDetailResponseAssembler $responseAssembler
    ) {
        $this->functionalEntityGateway = $functionalEntityGateway;
        $this->responseAssembler = $responseAssembler;
    }

    /**
     * @Transaction
     *
     * @param EditFunctionalEntityRequest $useCaseRequest
     *
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    public function execute(UseCaseRequest $useCaseRequest): FunctionalEntityDetailResponse
    {
        $functionalEntity = $this->getFunctionalEntity($useCaseRequest->getFunctionalEntityId());
        $this->populate($functionalEntity, $useCaseRequest);

        $this->update($functionalEntity);

        return $this->createResponse($functionalEntity);
    }

    /**
     * @throws \OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException
     */
    private function getFunctionalEntity(int $functionalEntityId): FunctionalEntity
    {
        return $this->functionalEntityGateway->find($functionalEntityId);
    }

    private function populate(FunctionalEntity $functionalEntity, EditFunctionalEntityRequest $request): void
    {
        !$request->isField1Updated() ?: $functionalEntity->setField1($request->getField1());
        !$request->isField2Updated() ?: $functionalEntity->setField2($request->getField2());
        !$request->isField3Updated() ?: $functionalEntity->setField3($request->isField3());
        !$request->isField4Updated() ?: $functionalEntity->setField4($request->getField4());
    }

    private function update(FunctionalEntity $functionalEntity): void
    {
        $this->functionalEntityGateway->update($functionalEntity);
    }

    private function createResponse(FunctionalEntity $functionalEntity): FunctionalEntityDetailResponse
    {
        return $this->responseAssembler->create($functionalEntity);
    }
}