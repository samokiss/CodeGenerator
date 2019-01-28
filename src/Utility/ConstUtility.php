<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use Carbon\Carbon;
use Faker\Provider\Base;
use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ConstUtility
{
    public static function generateStubConstObject(
        FieldObject $fieldObject,
        FileObject $stubFileObject
    ): ConstObject
    {
        $constObject = new ConstObject($fieldObject->getName());
        $constObject->setValue(
            StubUtility::createFakeValue($fieldObject->getType(), $fieldObject->getName(), $stubFileObject->getShortName())
        );

        return $constObject;
    }

    /**
     * @return ConstObject[]
     */
    public static function generateConstsFromStubReference(FileObject $stubReference): array
    {
        $constObjects = [];
        foreach ($stubReference->getConsts() as $const) {
            $constObject = new ConstObject($const->getName());
            $constObject->setValue($stubReference->getShortName() . '::' . $const->getName());
            $constObjects[] = $constObject;
        }

        return $constObjects;
    }
}
