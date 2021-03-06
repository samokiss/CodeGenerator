<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GenericUseCaseSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseSkeletonModel;
}
