<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

class MethodUtility
{
    public static function buildGetEntityIdMethodObject(string $shortClassName): MethodObject
    {
        $methodChained = new MethodObject(NameUtility::creatGetEntityIdName($shortClassName));
        $methodChained->setReturnType('int');
        $methodChained->setNullable(false);

        return $methodChained;
    }

    public static function buildIsUpdatedMethods(string $className): array
    {
        $rc = new \ReflectionClass($className);

        $methodsChained = [];
        foreach ($rc->getProperties() as $field) {
            if (FieldUtility::isUpdatable($field->getName())) {
                $methodsChained[] = self::buildIsUpdatedMethodObject($field);
            }
        }

        return $methodsChained;
    }

    public static function buildIsUpdatedMethodObject(\ReflectionProperty $field): MethodObject
    {
        $methodChained = new MethodObject(NameUtility::createIsUpdatedName($field));
        $methodChained->setReturnType('bool');
        $methodChained->setNullable(false);

        return $methodChained;
    }

    public static function buildWitherCalledMethods(string $className): array
    {
        $rc = new \ReflectionClass($className);

        $methodsChained = [];
        foreach ($rc->getProperties() as $field) {
            if (FieldUtility::isUpdatable($field->getName())) {
                $methodsChained[] = self::buildWitherCalledMethod($field, $className);
            }
        }

        return $methodsChained;
    }

    private static function buildWitherCalledMethod(\ReflectionProperty $field, string $className): MethodObject
    {
        $methodChained = new MethodObject(NameUtility::createMethodsChainedName($field));
        $methodChained->setReturnType(DocCommentUtility::getReturnType($field->getDocComment()));
        $methodChained->addArgument(self::buildConstantArgument($className, $field));

        return $methodChained;
    }

    private static function buildConstantArgument(string $className, \ReflectionProperty $field): FieldObject
    {
        return new FieldObject(
            FileObjectUtility::getShortClassName($className) . 'Stub1::' . StringUtility::convertToUpperSnakeCase(
                $field->getName()
            )
        );
    }

    public static function buildWitherMethods(string $className, string $returnType = null): array
    {
        $rc = new \ReflectionClass($className);

        $methodsChained = [];
        foreach ($rc->getProperties() as $field) {
            if (FieldUtility::isUpdatable($field->getName())) {
                $methodsChained[] = self::buildWitherMethodObject($field, $returnType);
            }
        }

        return $methodsChained;
    }

    private static function buildWitherMethodObject(\ReflectionProperty $field, ?string $returnType): MethodObject
    {
        $methodChained = new MethodObject(NameUtility::createMethodsChainedName($field));
        if (null !== $returnType) {
            $methodChained->setReturnType($returnType);
        }
        $methodChained->addArgument(self::buildArgument($field));

        return $methodChained;
    }

    private static function buildArgument(\ReflectionProperty $field): FieldObject
    {
        $argument = new FieldObject($field->getName());
        if ($field->getDocComment()) {
            $argument->setDocComment($field->getDocComment());
        }

        return $argument;
    }

    public static function createAccessorNameFromMethod(string $method): ?string
    {
        if ('get' === substr($method, 0, 3)) {
            return lcfirst(substr($method, 3));
        }
        if ('is' === substr($method, 0, 2)) {
            return lcfirst(substr($method, 2));
        }

        return null;
    }

    /**
     * @param string[] $fields
     *
     * @return MethodObject[]
     */
    public static function getSelectedAccessors(string $className, array $fields = []): array
    {
        $methods = self::getAccessors($className);

        $methods = self::removeNotSelectedFields($fields, $methods);

        return $methods;
    }

    public static function getAccessors(string $className): array
    {
        $rc = new \ReflectionClass($className);
        $methods = $rc->getMethods();

        $accessors = [];
        foreach ($methods as $key => $method) {
            if (self::isAccessor($method)) {
                $accessors[] = self::buildAccessor($method);
            }
        }

        return $accessors;
    }

    private static function isAccessor(\ReflectionMethod $method): bool
    {
        return ('get' === substr($method->getName(), 0, 3) || 'is' === substr($method->getName(), 0, 2));
    }

    private static function buildAccessor(\ReflectionMethod $method): MethodObject
    {
        if (null !== $method->getReturnType()) {
            return self::buildAccessorFromReturnType($method);
        }

        if (false !== $method->getDocComment()) {
            return self::buildAccessorFromDocType($method);
        }

        throw new \Exception("{$method->class}::{$method->getName()} return value is not typed");
    }

    private static function buildAccessorFromReturnType(\ReflectionMethod $method): MethodObject
    {
        $accessor = new MethodObject($method->getName());
        $accessor->setDocComment($method->getDocComment());
        $accessor->setReturnType($method->getReturnType()->getName());
        $accessor->setNullable($method->getReturnType()->allowsNull());

        return $accessor;
    }

    private static function buildAccessorFromDocType(\ReflectionMethod $method): MethodObject
    {
        $accessor = new MethodObject($method->getName());
        $accessor->setDocComment($method->getDocComment());
        $accessor->setReturnType(DocCommentUtility::getReturnType($method->getDocComment()));
        $accessor->setNullable(DocCommentUtility::allowsNull($method->getDocComment()));

        return $accessor;
    }

    /**
     * @param string[]            $fields
     * @param \ReflectionMethod[] $methods
     *
     * @return \ReflectionMethod[]
     */
    private static function removeNotSelectedFields(array $fields, array $methods): array
    {
        foreach ($methods as $key => $method) {
            if (!in_array($method->getAccessorName(), $fields)) {
                unset($methods[$key]);
            }
        }

        return array_values($methods);
    }

    /**
     * @return MethodObject[]
     */
    public static function getAccessorsUpdatable(string $className): array
    {
        $accessors = self::getAccessors($className);

        foreach ($accessors as $key => $accessor) {
            if (in_array($accessor->getName(), ['getId', 'getCreatedAt', 'getUpdatedAt'])) {
                unset($accessors[$key]);
            }
        }

        return $accessors;
    }
}
