<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseDetailResponseTestCaseGeneratorRequest;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseTestCaseGeneratorRequestDTO implements UseCaseDetailResponseTestCaseGeneratorRequest
{
    /**
     * @var string
     */
    public $entity;

    /**
     * @var string[]
     */
    public $fields;

    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * {@inheritdoc}
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
