<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseGeneratorRequestDTO implements UseCaseResponseGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    /**
     * @var array
     */
    public $fields;

    public function getEntity(): string
    {
        return $this->entity;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}
