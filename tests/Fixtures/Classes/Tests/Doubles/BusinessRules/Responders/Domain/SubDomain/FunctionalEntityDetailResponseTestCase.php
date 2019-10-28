<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use PHPUnit\Framework\Assert;

trait FunctionalEntityDetailResponseTestCase
{
    use FunctionalEntityResponseTestCase;

    public function assertFunctionalEntityDetailResponse(
        FunctionalEntityDetailResponse $expected,
        FunctionalEntityDetailResponse $actual
    ): void {
        $this->assertFunctionalEntityResponse($expected, $actual);
        Assert::assertSame($expected->getField4(), $actual->getField4());
    }
}
