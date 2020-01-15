<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityViewModelDetail;
use PHPUnit\Framework\Assert;

trait FunctionalEntityViewModelDetailTestCase
{
    use FunctionalEntityViewModelTestCase;

    public function assertFunctionalEntityViewModelDetail(FunctionalEntityViewModelDetail $expected, FunctionalEntityViewModelDetail $actual): void
    {
        $this->assertFunctionalEntityViewModel($expected, $actual);
        Assert::assertEquals($expected->field4, $actual->field4);
    }
}
