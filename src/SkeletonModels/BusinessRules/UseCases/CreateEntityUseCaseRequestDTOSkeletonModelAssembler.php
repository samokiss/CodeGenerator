<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityRequestFileObject,
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityUseCaseRequestDTOSkeletonModel;
}
