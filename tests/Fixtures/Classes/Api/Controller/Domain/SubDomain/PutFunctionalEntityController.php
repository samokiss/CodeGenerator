<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain;

use OC\ApiBundle\Framework\FrameworkBundle\Controller\AbstractApiController;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PutFunctionalEntityModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\EditFunctionalEntity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PutFunctionalEntityController extends AbstractApiController
{
    /**
     * @var EditFunctionalEntityRequestBuilder
     */
    private $editFunctionalEntityRequestBuilder;

    public function __construct(EditFunctionalEntityRequestBuilder $builder)
    {
        $this->editFunctionalEntityRequestBuilder = $builder;
    }

    /**
     * @Security("")
     */
    public function putAction(int $functionalEntityId): JsonResponse
    {
        try {
            $model = $this->buildModel($this->getRequest());
            $this->updateFunctionalEntity($model, $functionalEntityId);

            return $this->createUpdatedResponse();
        } catch (FunctionalEntityNotFoundException $e) {
            $this->throwNotFoundException();
        }
    }

    private function buildModel(Request $request): PutFunctionalEntityModel
    {
        $this->checkContentIsNotEmpty($request);
        $model = $this->getModelData($request);
        $this->validate($model);

        return $model;
    }

    private function getModelData(Request $request): PutFunctionalEntityModel
    {
        return $this->deserialize($request->getContent(), PutFunctionalEntityModel::class);
    }

    /**
     * @throws FunctionalEntityNotFoundException
     */
    private function updateFunctionalEntity(PutFunctionalEntityModel $model, int $functionalEntityId): void
    {
        $this->get(EditFunctionalEntity::class)->execute($this->buildRequest($model, $functionalEntityId));
    }

    private function buildRequest(PutFunctionalEntityModel $model, int $functionalEntityId): EditFunctionalEntityRequest
    {
        return $this->editFunctionalEntityRequestBuilder
            ->create()
            ->withFunctionalEntityId($functionalEntityId)
            ->withField1($model->field1)
            ->withField2($model->field2)
            ->withField3($model->field3)
            ->withField4($model->field4)
            ->build();
    }
}