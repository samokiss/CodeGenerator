<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelDetailImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelDetailImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailImplSkeletonModelAssemblerImpl implements ViewModelDetailImplSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailImplFileObject
    ): ViewModelDetailImplSkeletonModel
    {
        $skeletonModel = new ViewModelDetailImplSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailImplFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailImplFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailImplFileObject->getShortName();
        $skeletonModel->parentClassName = $viewModelDetailFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelDetailFileObject->getShortName();

        return $skeletonModel;
    }
}
