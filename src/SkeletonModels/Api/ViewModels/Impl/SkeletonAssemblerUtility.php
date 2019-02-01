<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait SkeletonAssemblerUtility
{
    private function getUseCaseListItemResponseArgument(string $entity): string
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];

        if ($this->IsVowelWordEnds($entity, $vowels)) {
            return lcfirst(substr($entity, 0, -1) . 'ies');
        }

        return lcfirst($entity . 's');
    }

    private function IsVowelWordEnds(string $entity, array $vowels): bool
    {
        return ('y' === substr($entity, -1) && !in_array(substr($entity, -2), $vowels));
    }
}
