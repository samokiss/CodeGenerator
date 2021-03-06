<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject
    ): UseCaseDetailResponseAssemblerSkeletonModel;
}
