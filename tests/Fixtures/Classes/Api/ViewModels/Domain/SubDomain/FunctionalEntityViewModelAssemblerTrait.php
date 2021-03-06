<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

trait FunctionalEntityViewModelAssemblerTrait
{
    private function hydrateCommonFields(FunctionalEntityViewModel $vm, FunctionalEntityResponse $functionalEntity): void
    {
        $vm->field1 = $functionalEntity->getField1();
        $vm->field2 = $functionalEntity->getField2();
        $vm->field3 = $functionalEntity->isField3();
        $vm->id = $functionalEntity->getId();
    }
}
