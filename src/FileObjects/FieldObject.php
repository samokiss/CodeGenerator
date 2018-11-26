<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\FileObjects;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FieldObject
{
    const SCOPE_PRIVATE = 'private';

    const SCOPE_PUBLIC = 'public';

    /**
     * @var string
     */
    protected $accessor;

    /**
     * @var string
     */
    protected $docComment;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool;
     */
    protected $inherited = false;

    /**
     * @var string
     */
    protected $scope = FieldObject::SCOPE_PRIVATE;

    /**
     * @var mixed
     */
    protected $value;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function isInherited(): bool
    {
        return $this->inherited;
    }

    /**
     * @param bool $parentField
     */
    public function setInherited(bool $inherited): void
    {
        $this->inherited = $inherited;
    }

    public function getAccessor(): string
    {
        return $this->accessor;
    }

    public function setAccessor(string $accessor = null)
    {
        $this->accessor = $accessor;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope)
    {
        $this->scope = $scope;
    }

    public function getType(): string
    {
        if (null !== $this->getDocComment() && strpos($this->getDocComment(), '[]') !== false) {
            return 'array';
        }

        return preg_replace('/(\W)|(var)/', '', $this->getDocComment());
    }

    public function getDocComment(): ?string
    {
        return $this->docComment;
    }

    public function setDocComment(string $docComment)
    {
        $this->docComment = $docComment;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }
}
