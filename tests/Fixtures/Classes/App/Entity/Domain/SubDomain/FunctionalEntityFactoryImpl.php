<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityFactory;

class FunctionalEntityFactoryImpl implements FunctionalEntityFactory
{
    public function create(): FunctionalEntity
    {
        return new FunctionalEntityImpl();
    }
}
