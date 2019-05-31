<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseListItemResponseTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\Request\UseCaseResponseTestCaseGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseTestCaseGeneratorRequestBuilderImpl implements UseCaseResponseTestCaseGeneratorRequestBuilder
{
    /**
     * @var UseCaseResponseTestCaseGeneratorRequestDTO
     */
    private $request;

    public function create(): UseCaseResponseTestCaseGeneratorRequestBuilder
    {
        $this->request = new UseCaseResponseTestCaseGeneratorRequestDTO();

        return $this;
    }

    public function withEntity(string $entity): UseCaseResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->entity = $entity;

        return $this;
    }

    public function withFields(array $fields): UseCaseResponseTestCaseGeneratorRequestBuilder
    {
        $this->request->fields = $fields;

        return $this;
    }

    public function build(): UseCaseResponseTestCaseGeneratorRequest
    {
        return $this->request;
    }
}