<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseAssemblerTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): UseCaseResponseAssemblerTraitSkeletonModel;
}