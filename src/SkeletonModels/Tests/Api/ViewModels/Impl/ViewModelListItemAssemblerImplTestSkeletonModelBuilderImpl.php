<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\TestCaseUtility;

class ViewModelListItemAssemblerImplTestSkeletonModelBuilderImpl implements ViewModelListItemAssemblerImplTestSkeletonModelBuilder
{
    /**
     * @var ViewModelListItemAssemblerImplTestSkeletonModel
     */
    private $skeletonModel;

    public function build(): ViewModelListItemAssemblerImplTestSkeletonModel
    {
        return $this->skeletonModel;
    }

    public function create(): ViewModelListItemAssemblerImplTestSkeletonModelBuilder
    {
        $this->skeletonModel = new ViewModelListItemAssemblerImplTestSkeletonModelImpl();

        return $this;
    }

    public function withUseCaseListItemResponseStub(
        FileObject $useCaseListItemResponseStub
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseStubShortName = $useCaseListItemResponseStub->getShortName();
        $this->skeletonModel->useCaseListItemResponseStubClassName = $useCaseListItemResponseStub->getClassName();

        return $this;
    }

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemAssemblerShortName = $viewModelListItemAssembler->getShortName();
        $this->skeletonModel->viewModelListItemAssemblerClassName = $viewModelListItemAssembler->getClassName();

        return $this;
    }

    public function withViewModelListItemAssemblerImpl(
        FileObject $viewModelListItemAssemblerImpl
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemAssemblerImplShortName = $viewModelListItemAssemblerImpl->getShortName();
        $this->skeletonModel->viewModelListItemAssemblerImplClassName = $viewModelListItemAssemblerImpl->getClassName();

        return $this;
    }

    public function withViewModelListItemAssemblerImplTest(
        FileObject $viewModelListItemAssemblerImplTest
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder {
        $this->skeletonModel->className = $viewModelListItemAssemblerImplTest->getClassName();
        $this->skeletonModel->shortName = $viewModelListItemAssemblerImplTest->getShortName();
        $this->skeletonModel->namespace = $viewModelListItemAssemblerImplTest->getNamespace();

        return $this;
    }

    public function withViewModelListItemStub(
        FileObject $viewModelListItemStub
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemStubShortName = $viewModelListItemStub->getShortName();
        $this->skeletonModel->viewModelListItemStubClassName = $viewModelListItemStub->getClassName();

        return $this;
    }

    public function withViewModelListItemTestCase(
        FileObject $viewModelListItemTestCase
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemTestCaseShortName = $viewModelListItemTestCase->getShortName();
        $this->skeletonModel->viewModelListItemTestCaseClassName = $viewModelListItemTestCase->getClassName();
        $this->skeletonModel->viewModelListItemTestCaseMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelListItemTestCase->getShortName()
        );

        return $this;
    }
}
