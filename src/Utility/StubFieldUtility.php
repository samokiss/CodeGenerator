<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class StubFieldUtility
{
    /**
     * @param FieldObject[]
     *
     * @return FieldObject[]
     */
    public static function generateStubFieldObjects(array $fields, $fileObject): array
    {
        $fieldObjects = [];
        foreach ($fields as $field) {
            $fieldObjects[] = self::buildStubFieldObject($field, $fileObject);
        }

        return $fieldObjects;
    }

    private static function buildStubFieldObject(FieldObject $fieldObject, FileObject $fileObject): FieldObject
    {
        $stubFieldObject = new FieldObject($fieldObject->getName());
        $stubFieldObject->setDocComment($fieldObject->getDocComment());
        $stubFieldObject->setScope($fieldObject->getScope());
        $stubFieldObject->setValue(ConstUtility::generateStubConstObject($stubFieldObject, $fileObject));

        return $stubFieldObject;
    }
}