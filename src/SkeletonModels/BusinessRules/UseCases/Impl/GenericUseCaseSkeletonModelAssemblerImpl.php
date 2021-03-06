<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\SecurityClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class GenericUseCaseSkeletonModelAssemblerImpl implements GenericUseCaseSkeletonModelAssembler
{
    use SecurityClassNameTrait;
    use UseCaseClassNameTrait;

    public function create(
        FileObject $genericUseCaseFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseSkeletonModel {
        $skeletonModel = new GenericUseCaseSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseFileObject->getShortName();
        $skeletonModel->useCaseClassName = $this->useCaseClassName;
        $skeletonModel->genericUseCaseRequestClassName = $genericUseCaseRequestFileObject->getClassName();
        $skeletonModel->genericUseCaseRequestShortName = $genericUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestArgument = lcfirst(
            FileObjectUtility::getShortClassName($this->useCaseRequestClassName)
        );
        $skeletonModel->securityClassName = $this->securityClassName;
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
