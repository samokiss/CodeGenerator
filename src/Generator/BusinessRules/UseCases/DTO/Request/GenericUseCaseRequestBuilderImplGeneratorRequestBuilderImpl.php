<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseRequestBuilderImplGeneratorRequestBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderImplGeneratorRequestBuilderImpl implements GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
{
    /**
     * @var GenericUseCaseRequestBuilderImplGeneratorRequestDTO
     */
    private $request;

    public function create(): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request = new GenericUseCaseRequestBuilderImplGeneratorRequestDTO();

        return $this;
    }

    public function withDomainAndUseCaseName(
        string $domain,
        string $useCaseName
    ): GenericUseCaseRequestBuilderImplGeneratorRequestBuilder
    {
        $this->request->domain = $domain;
        $this->request->useCaseName = $useCaseName;

        return $this;
    }

    public function build(): GenericUseCaseRequestBuilderImplGeneratorRequest
    {
        return $this->request;
    }
}