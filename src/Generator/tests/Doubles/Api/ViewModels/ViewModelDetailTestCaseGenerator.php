<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailTestCaseSkeletonModelAssembler
     */
    private $viewModelDetailTestCaseSkeletonModelAssembler;

    /**
     * @param ViewModelDetailTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailTestCaseFileObject = $this->buildDetailTestCaseFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelDetailTestCaseFileObject);

        return $viewModelDetailTestCaseFileObject;
    }

    public function buildDetailTestCaseFileObject(string $useCaseResponseClassName): FileObject
    {
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject($useCaseResponseClassName);
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject(
            $useCaseDetailResponseFileObject
        );
        $viewModelDetailTestCaseFileObject = $this->createViewModelDetailTestCaseFileObject(
            $useCaseDetailResponseFileObject
        );
        $viewModelDetailFileObject = $this->createViewModelDetailFileObject(
            $useCaseDetailResponseFileObject
        );
        $viewModelDetailTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseDetailResponseFileObject->getClassName())
        );
        $viewModelDetailTestCaseFileObject->setContent(
            $this->generateContent(
                $viewModelDetailTestCaseFileObject,
                $viewModelDetailFileObject,
                $viewModelTestCaseFileObject
            )
        );

        return $viewModelDetailTestCaseFileObject;

    }

    protected function createUseCaseDetailResponseFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $domain,
            $entity
        );
    }

    private function createViewModelTestCaseFileObject(FileObject $viewModelListItemFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity()
        );
    }

    private function createViewModelDetailFileObject(FileObject $viewModelListItemFileObject): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity()
        );
    }

    public function generateContent(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelTestCaseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelDetailTestCaseFileObject,
            $useCaseDetailResponseFileObject,
            $viewModelTestCaseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelTestCaseFileObject
    ): ViewModelDetailTestCaseSkeletonModel
    {
        return $this->viewModelDetailTestCaseSkeletonModelAssembler->create(
            $viewModelDetailTestCaseFileObject,
            $useCaseDetailResponseFileObject,
            $viewModelTestCaseFileObject
        );
    }

    public function setViewModelDetailTestCaseSkeletonModelAssembler(
        ViewModelDetailTestCaseSkeletonModelAssembler $viewModelDetailTestCaseSkeletonModelAssembler
    )
    {
        $this->viewModelDetailTestCaseSkeletonModelAssembler = $viewModelDetailTestCaseSkeletonModelAssembler;
    }

    /**
     * @param FileObject $useCaseDetailResponseFileObject
     *
     * @return FileObject
     */
    private function createViewModelDetailTestCaseFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        $viewModelDetailTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );

        return $viewModelDetailTestCaseFileObject;
}
}
