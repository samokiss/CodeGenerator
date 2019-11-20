<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditFunctionalEntityRequestDTO;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EditEntityUseCaseRequestDTOMethodObjectStub1 extends MethodObject
{
    const DOC_COMMENT = null;

    const NAME = 'isField1Updated';

    const NULLABLE = false;

    const RETURN_TYPE = 'bool';

    const VALUE = null;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $nullable = self::NULLABLE;

    protected $returnType = self::RETURN_TYPE;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
