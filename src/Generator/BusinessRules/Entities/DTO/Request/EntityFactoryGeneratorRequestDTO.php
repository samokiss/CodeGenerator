<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request\EntityFactoryGeneratorRequest;

class EntityFactoryGeneratorRequestDTO implements EntityFactoryGeneratorRequest
{
    /**
     * @var string
     */
    public $entityClassName;

    public function getEntityClassName(): string
    {
        return $this->entityClassName;
    }
}
