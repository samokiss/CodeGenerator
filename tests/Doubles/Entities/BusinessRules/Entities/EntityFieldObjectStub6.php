<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class EntityFieldObjectStub6 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var \DateTimeInterface
     */';

    const NAME        = 'updatedAt';

    const VALUE       = null;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PROTECTED;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
