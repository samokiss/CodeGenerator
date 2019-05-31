<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseMediator
{
    public function mediate(array $args = [], array $options = []): array;
}