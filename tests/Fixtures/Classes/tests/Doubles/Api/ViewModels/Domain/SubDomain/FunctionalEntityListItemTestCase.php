<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItem;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FunctionalEntityListItemTestCase
{
    use FunctionalEntityTestCase;

    /**
     * @param FunctionalEntityListItem[] $expected
     * @param FunctionalEntityListItem[] $actual
     */
    protected function assertFunctionalEntityListItems(array $expected, array $actual)
    {
        Assert::assertCount(count($expected), $actual);
        foreach ($expected as $key => $item) {
            $this->assertFunctionalEntityListItem($item, $actual[$key]);
        }
    }

    private function assertFunctionalEntityListItem(FunctionalEntityListItem $expected, FunctionalEntityListItem $actual)
    {
        $this->assertFunctionalEntityTestCase($expected, $actual);
    }
}
