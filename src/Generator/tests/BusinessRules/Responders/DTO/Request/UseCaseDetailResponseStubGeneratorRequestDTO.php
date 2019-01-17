<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubGeneratorRequestDTO implements UseCaseDetailResponseStubGeneratorRequest
{
    /**
     * @var string
     */
    public $responseClassName;

    public function getUseCaseDetailResponseClassName(): string
    {
        return $this->responseClassName;
    }
}