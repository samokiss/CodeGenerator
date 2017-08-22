<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
abstract class Entity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $field1;

    /**
     * @var string[]
     */
    protected $field2;

    /**
     * @var bool
     */
    protected $field3;

    /**
     * @var \DateTime
     */
    protected $field4;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * @return array
     */
    public function getField2(): array
    {
        return $this->field2;
    }

    /**
     * @return bool
     */
    public function isField3(): bool
    {
        return $this->field3;
    }

    /**
     * @return \DateTime
     */
    public function getField4()
    {
        return $this->field4;
    }
}