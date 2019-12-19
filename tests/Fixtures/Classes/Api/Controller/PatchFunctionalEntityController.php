<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PatchFunctionalEntityModel;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequestBuilder;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\EditFunctionalEntity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PatchFunctionalEntityController extends AbstractApiController
{
    /**
     * @var EditFunctionalEntityRequestBuilder
     */
    private $editFunctionalEntityRequestBuilder;

    /**
     * @var FunctionalEntityViewModelDetailAssembler
     */
    private $functionalEntityViewModelDetailAssembler;

    public function __construct(
        EditFunctionalEntityRequestBuilder $builder,
        FunctionalEntityViewModelDetailAssembler $assembler
    ) {
        $this->editFunctionalEntityRequestBuilder = $builder;
        $this->functionalEntityViewModelDetailAssembler = $assembler;
    }

    /**
     * @Security("")
     */
    public function patchAction(Request $request, int $functionalEntityId): JsonResponse
    {
        try {
            $model = $this->getModelFromRequest(PatchFunctionalEntityModel::class);
            $response = $this->updateFunctionalEntity($functionalEntityId, $model);

            return $this->createJsonResponse($this->buildViewModel($response));
        } catch (FunctionalEntityNotFoundException $e) {
            throw $this->throwNotFoundException();
        }
    }

    /**
     * @throws FunctionalEntityNotFoundException
     */
    private function updateFunctionalEntity(int $functionalEntityId, PatchFunctionalEntityModel $model): void
    {
        $this->get(EditFunctionalEntity::class)->execute($this->buildRequest($functionalEntityId, $model));
    }

    /**
     * @param int                        $functionalEntityId
     * @param PatchFunctionalEntityModel $model
     *
     * @return EditFunctionalEntityRequest
     */
    private function buildRequest(
        int $functionalEntityId,
        PatchFunctionalEntityModel $model
    ): EditFunctionalEntityRequest {
        $requestBuilder = $this->editFunctionalEntityRequestBuilder
            ->create()
            ->withFunctionalEntityId($functionalEntityId);

        !$model->field1 ?: $requestBuilder->withField1($model->field1);
        !$model->field2 ?: $requestBuilder->withField2($model->field2);
        !$model->field3 ?: $requestBuilder->withField3($model->field3);
        !$model->field4 ?: $requestBuilder->withField4($model->field4);

        return $requestBuilder->build();
    }

    private function buildViewModel(FunctionalEntityDetailResponse $response): FunctionalEntityViewModelDetail
    {
        return $this->functionalEntityViewModelDetailAssembler->create($response);
    }
}
