<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface ViewModelTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel;
}
