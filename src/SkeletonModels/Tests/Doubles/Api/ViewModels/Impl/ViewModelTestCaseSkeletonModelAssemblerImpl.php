<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\TestCaseUtility;

class ViewModelTestCaseSkeletonModelAssemblerImpl implements ViewModelTestCaseSkeletonModelAssembler
{
    use StubSkeletonAssemblerTrait;

    public function create(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel {
        $skeletonModel = new ViewModelTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelTestCaseFileObject->getFields();

        $skeletonModel->sourceClassName = $viewModelFileObject->getClassName();
        $skeletonModel->sourceShortName = $viewModelFileObject->getShortName();
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        $skeletonModel->viewModelMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelTestCaseFileObject->getShortName()
        );

        return $skeletonModel;
    }
}
