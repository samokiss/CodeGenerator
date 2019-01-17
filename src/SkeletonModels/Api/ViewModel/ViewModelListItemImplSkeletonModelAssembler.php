<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemImplSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): ViewModelListItemImplSkeletonModel;
}