<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ConstUtility
{
    /**
     * @return ConstObject[]
     */
    public static function generateConstsFromStubFileObject(FileObject $fileObject, string $type = null): array
    {
        $constObjects = [];
        foreach ($fileObject->getFields() as $field) {
            $constObject = new ConstObject($field->getName());
            $constObject->setValue($fileObject->getEntity() . $type . 'Stub1::' . $constObject->getName());
            $constObjects[] = $constObject;
        }

        return $constObjects;
    }

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
    public static function generatePatchModelConsts(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $reflectionProperties */
        $reflectionProperties = $rc->getProperties(\ReflectionProperty::IS_PROTECTED);
        $constObjects = [];
        foreach ($reflectionProperties as $field) {
            if ($field->getDeclaringClass()->getName() === $className && FieldUtility::isUpdatable($field)) {
                $constObjects[] = self::buildPatchConst($field);
            }
        }

        return $constObjects;
    }

    private static function buildPatchConst(\ReflectionProperty $field): ConstObject
    {
        $constObject = new ConstObject(NameUtility::createPatchEntityModelConstantName($field));
        $constObject->setValue($field->getName());

        return $constObject;
    }
}
