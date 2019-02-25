<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseSkeletonModelAssemblerImpl implements GenericUseCaseSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(FileObject $genericUseCaseFileObject): GenericUseCaseSkeletonModel
    {
        $skeletonModel = new GenericUseCaseSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseFileObject->getShortName();
        $skeletonModel->useCaseClassName = $this->useCaseClassName;
        $skeletonModel->useCaseRequestArgument = lcfirst(
            FileObjectUtility::getShortClassName($this->useCaseRequestClassName)
        );
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}