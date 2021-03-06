<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EditEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestBuilderImplFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestBuilderImplSkeletonModel;
}
