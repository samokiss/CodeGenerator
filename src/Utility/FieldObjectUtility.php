<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FieldObjectUtility
{
    public static function buildEntityIdMethodObject(string $shortClassName): FieldObject
    {
        $methodChained = new FieldObject(NameUtility::creatEntityIdName($shortClassName));
        $methodChained->setDocComment(DocCommentUtility::setType('int'));
        $methodChained->setScope(FieldObject::SCOPE_PUBLIC);

        return $methodChained;
    }

    private static function buildField(\ReflectionProperty $field, string $scope): FieldObject
    {
        $fieldObject = new FieldObject($field->getName());
        $fieldObject->setAccessor(self::getFieldAccessor($field));
        $fieldObject->setDocComment($field->getDocComment());
        $fieldObject->setScope($scope);

        return $fieldObject;
    }

    /**
     * @param \ReflectionProperty[] $reflectionProperties
     *
     * @return FieldObject[]
     */
    private static function buildFields(array $reflectionProperties, string $scope = FieldObject::SCOPE_PUBLIC): array
    {
        $fields = [];
        foreach ($reflectionProperties as $field) {
            $fields[] = self::buildField($field, $scope);
        }

        return $fields;
    }

    /**
     * @return FieldObject[]
     */
    public static function buildIsUpdatedFields(string $className, string $scope = FieldObject::SCOPE_PUBLIC): array
    {
        $rc = new \ReflectionClass($className);

        $fields = [];
        foreach ($rc->getProperties() as $field) {
            if (FieldUtility::isUpdatable($field)) {
                $fields[] = self::buildUpdatedField($field, $scope);
            }
        }

        return $fields;
    }

    private static function buildUpdatedField(\ReflectionProperty $field, string $scope): FieldObject
    {
        $field = new FieldObject(NameUtility::createUpdatedName($field));
        $field->setDocComment(DocCommentUtility::setType('bool'));
        $field->setScope($scope);
        $field->setValue('false');

        return $field;
    }

    private static function getFieldAccessor(\ReflectionProperty $field): ?string
    {
        $fieldName = $field->getName();
        $declaringClass = $field->getDeclaringClass();

        $accessor = 'get' . ucfirst($fieldName);
        if ($declaringClass->hasMethod($accessor)) {
            return $accessor;
        }
        $accessor = 'is' . ucfirst($fieldName);
        if ($declaringClass->hasMethod($accessor)) {
            return $accessor;
        }

        return null;
    }

    /**
     * @return FieldObject[]
     */
    public static function getProtectedClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $reflectionProperties */
        $reflectionProperties = $rc->getProperties(\ReflectionProperty::IS_PROTECTED);
        $classProperties = [];
        foreach ($reflectionProperties as $field) {
            if ($field->getDeclaringClass()->getName() === $className &&
                !self::isTraitsProperty($rc->getTraitNames(), $field)
            ) {
                $classProperties[] = $field;
            }
        }

        return self::buildFields($classProperties, FieldObject::SCOPE_PROTECTED);
    }

    /**
     * @return FieldObject[]
     */
    public static function getPublicClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $rcProperties */
        $rcProperties = $rc->getProperties(\ReflectionProperty::IS_PUBLIC);
        $classProperties = [];
        foreach ($rcProperties as $rcProperty) {
            if ($rcProperty->getDeclaringClass()->getName() === $className &&
                !self::isTraitsProperty($rc->getTraitNames(), $rcProperty)
            ) {
                $classProperties[] = $rcProperty;
            }
        }

        return self::buildFields($classProperties);
    }

    /**
     * @return FieldObject[]
     */
    private static function getPublicTraitFields(string $traitName): array
    {
        $rc = new \ReflectionClass($traitName);
        /** @var \ReflectionProperty[] $traitProperties */
        $traitProperties = $rc->getProperties(\ReflectionProperty::IS_PUBLIC);
        $properties = [];
        foreach ($traitProperties as $traitProperty) {
            if ($traitProperty->getDeclaringClass()->getName() === $traitName) {
                $properties[] = $traitProperty;
            }
        }

        return self::buildFields($properties);
    }

    /**
     * @return FieldObject[]
     */
    public static function getPublicTraitsFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        $traitFields = [];
        foreach ($rc->getTraitNames() as $traitName) {
            $traitFields = self::getPublicTraitFields($traitName);
        }

        return $traitFields;
    }

    private static function isTraitProperty(string $traitName, \ReflectionProperty $field): bool
    {
        /** @var FieldObject[] $traitProperties */
        $traitProperties = self::getPublicTraitFields($traitName);

        foreach ($traitProperties as $traitProperty) {
            if ($traitProperty->getName() === $field->getName()) {
                return true;
            }
        }

        return false;
    }

    private static function isTraitsProperty(array $traitNames, \ReflectionProperty $field): bool
    {
        foreach ($traitNames as $traitName) {
            if (self::isTraitProperty($traitName, $field)) {
                return true;
            }
        }

        return false;
    }
}
