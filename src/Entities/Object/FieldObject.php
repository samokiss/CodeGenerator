<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Object;

use OpenClassrooms\CodeGenerator\Utility\DocCommentUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FieldObject
{
    const SCOPE_PRIVATE = 'private';

    const SCOPE_PROTECTED = 'protected';

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

    public function getAccessor()
    {
        return $this->accessor;
    }

    public function getDocComment(): ?string
    {
        return $this->docComment;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function getType(): string
    {
        if (null !== $this->getDocComment() && preg_match('/\[]/', $this->getDocComment())) {
            return 'array';
        }

        return DocCommentUtility::getType($this->getDocComment());
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function isObject(): bool
    {
        return StringUtility::isObject($this->getType());
    }

    public function setAccessor(string $accessor = null)
    {
        $this->accessor = $accessor;
    }

    public function setDocComment(string $docComment)
    {
        $this->docComment = $docComment;
    }

    public function setScope(string $scope)
    {
        $this->scope = $scope;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }
}
