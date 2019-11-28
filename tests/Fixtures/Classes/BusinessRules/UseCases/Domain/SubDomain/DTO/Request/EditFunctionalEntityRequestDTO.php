<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Request;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest;

final class EditFunctionalEntityRequestDTO implements EditFunctionalEntityRequest
{
    /**
     * @var string
     */
    public $field1;

    /**
     * @var bool
     */
    public $field1Updated = false;

    /**
     * @var string[]
     */
    public $field2;

    /**
     * @var bool
     */
    public $field2Updated = false;

    /**
     * @var bool
     */
    public $field3;

    /**
     * @var bool
     */
    public $field3Updated = false;

    /**
     * @var \DateTimeInterface
     */
    public $field4;

    /**
     * @var bool
     */
    public $field4Updated = false;

    /**
     * @var int
     */
    public $functionalEntityId;

    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * @return string[]
     */
    public function getField2(): array
    {
        return $this->field2;
    }

    public function getField4(): ?\DateTimeInterface
    {
        return $this->field4;
    }

    public function getFunctionalEntityId(): int
    {
        return $this->functionalEntityId;
    }

    public function isField1Updated(): bool
    {
        return $this->field1Updated;
    }

    public function isField2Updated(): bool
    {
        return $this->field2Updated;
    }

    public function isField3(): bool
    {
        return $this->field3;
    }

    public function isField3Updated(): bool
    {
        return $this->field3Updated;
    }

    public function isField4Updated(): bool
    {
        return $this->field4Updated;
    }
}