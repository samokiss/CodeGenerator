<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait EntityAssemblerTrait
{
    protected function hydrateCommonFields(Entity $vm, EntityResponse $entity)
    {
        $vm->id = $entity->getId();
        $vm->field1 = $entity->getField1();
        $vm->field2 = $entity->getField2();
        $vm->field3 = $entity->isField3();
    }
}
