<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

final class MethodUtilityContext implements MethodUtilityStrategy
{
    private $strategy;

    public function __construct(MethodUtilityStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getAccessors(string $className): array
    {
        return $this->strategy->getAccessors($className);
    }
}
