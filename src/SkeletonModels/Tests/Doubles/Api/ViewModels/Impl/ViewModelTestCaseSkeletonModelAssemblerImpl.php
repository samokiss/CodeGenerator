<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseSkeletonModelAssemblerImpl implements ViewModelTestCaseSkeletonModelAssembler
{
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel
    {
        $skeletonModel = new ViewModelTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelTestCaseFileObject->getFields();
        $skeletonModel->sourceClassName = $viewModelFileObject->getClassName();
        $skeletonModel->sourceShortName = $viewModelFileObject->getShortName();
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}