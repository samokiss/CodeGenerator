<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

trait FunctionalEntityResponseCommonFieldTrait
{
    /**
     * @var string
     */
    public $field1;

    /**
     * @var string[]
     */
    public $field2;

    /**
     * @var bool
     */
    public $field3;

    /**
     * @var int
     */
    public $id;

    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * {@inheritDoc}
     */
    public function getField2(): array
    {
        return $this->field2;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isField3(): bool
    {
        return $this->field3;
    }
}
