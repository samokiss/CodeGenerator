<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse;
use PHPUnit\Framework\Assert;

/**
 * @author authorStub <author.stub@example.com>
 */
trait FunctionalEntityListItemResponseTestCase
{
    use FunctionalEntityResponseTestCase;

    /**
     * @param FunctionalEntityListItemResponse[] $expected
     * @param FunctionalEntityListItemResponse[] $actual
     */
    protected function assertFunctionalEntityListItemResponses(array $expected, array $actual): void
    {
        Assert::assertCount(count($expected), $actual);
        foreach ($expected as $key => $item) {
            $this->assertFunctionalEntityListItemResponse($item, $actual[$key]);
        }
    }

    private function assertFunctionalEntityListItemResponse(
        FunctionalEntityListItemResponse $expected,
        FunctionalEntityListItemResponse $actual
    ): void {
        $this->assertFunctionalEntityResponse($expected, $actual);
    }
}