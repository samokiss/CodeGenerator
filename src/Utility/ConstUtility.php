<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ConstUtility
{
    public static function generateStubConstObject(FieldObject $fieldObject, FileObject $stubFileObject): ConstObject
    {
        $constObject = new ConstObject($fieldObject->getName());
        $constObject->setValue(
            StubUtility::createFakeValue(
                $fieldObject->getType(),
                $fieldObject->getName(),
                $stubFileObject->getShortName()
            )
        );

        return $constObject;
    }

    /**
     * @return ConstObject[]
     */
    public static function generateConstsFromStubFileObject(FileObject $entityStub, string $type = null): array
    {
        $constObjects = [];
        foreach ($entityStub->getFields() as $field) {
            $constObject = new ConstObject($field->getName());
            $constObject->setValue($entityStub->getEntity() . $type . 'Stub1::' . $constObject->getName());
            $constObjects[] = $constObject;
        }

        return $constObjects;
    }
}
