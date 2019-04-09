<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\GetFunctionalEntitiesRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseAssembler;
use OpenClassrooms\UseCase\BusinessRules\Entities\PaginatedCollection;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;
use OpenClassrooms\UseCase\BusinessRules\Responders\PaginatedUseCaseResponse;

/**
 * @author authorStub <author.stub@example.com>
 */
class GetFunctionalEntities implements UseCase
{
    /**
     * @var FunctionalEntityGateway
     */
    private $gateway;

    /**
     * @var FunctionalEntityListItemResponseAssembler
     */
    private $responseAssembler;

    /**
     * @param GetFunctionalEntitiesRequest $useCaseRequest
     *
     * @return \OpenClassrooms\UseCase\BusinessRules\Responders\PaginatedUseCaseResponse
     */
    public function execute(UseCaseRequest $useCaseRequest)
    {
        $functionalEntities = $this->getFunctionalEntities(
            $useCaseRequest->getFilters(),
            $useCaseRequest->getSorts(),
            $this->buildPagination($useCaseRequest->getPage(), $useCaseRequest->getItemsPerPage())
        );

        return $this->buildResponse($functionalEntities);
    }

    private function getFunctionalEntities(array $filters, array $sorts, array $pagination): PaginatedCollection
    {
        return $this->gateway->findAll($filters, $sorts, $pagination);
    }

    private function buildPagination(int $page, int $itemPerPage): array
    {
        return [
            PaginatedCollection::PAGE           => $page,
            PaginatedCollection::ITEMS_PER_PAGE => $itemPerPage,
        ];
    }

    private function buildResponse(PaginatedCollection $functionalEntities): PaginatedUseCaseResponse
    {
        return $this->responseAssembler->createPaginatedCollection($functionalEntities);
    }

    public function setGateway(FunctionalEntityGateway $gateway): void
    {
        $this->gateway = $gateway;
    }

    public function setFunctionalEntityResponseAssembler(FunctionalEntityListItemResponseAssembler $assembler): void
    {
        $this->responseAssembler = $assembler;
    }
}