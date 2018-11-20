<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseGeneratorRequestDTO implements ViewModelTestCaseGeneratorRequest
{
    /**
     * @var string
     */
    public $className;

    public function getClassName(): string
    {
        return $this->className;
    }
}
