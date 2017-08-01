<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityAssemblerTrait;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EntityDetailAssemblerImpl implements EntityDetailAssembler
{
    use EntityAssemblerTrait;

    public function createDetail(EntityDetailResponse $entity): EntityDetail
    {
        $vm = new EntityDetailImpl();
        $this->hydrateCommonFields($vm, $entity);

        return $vm;
    }
}
