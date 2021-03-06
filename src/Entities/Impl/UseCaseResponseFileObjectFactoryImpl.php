<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities\Impl;

use InvalidArgumentException;
use OpenClassrooms\CodeGenerator\Entities\AbstractFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;

class UseCaseResponseFileObjectFactoryImpl extends AbstractFileObjectFactory implements UseCaseResponseFileObjectFactory
{
    public function create(string $type, string $domain, string $entity, string $baseNamespace = null): FileObject
    {
        $this->baseNamespace = $baseNamespace ?? $this->baseNamespace;

        switch ($type) {
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseCommonFieldTrait'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseDTO'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ListItemResponseDTO'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ResponseStub1'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseStub1'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseTestCase'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseStub1'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseTestCase'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'Response'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TEST_CASE:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ResponseTestCase'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponse'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponse'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseAssembler'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'DetailResponseAssemblerImpl'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_MOCK:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'DetailResponseAssemblerMock'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseAssembler'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ListItemResponseAssemblerImpl'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_MOCK:
                return new FileObject(
                    $this->stubNamespace . 'BusinessRules\Responders\\' . $domain . '\\' . $entity . 'ListItemResponseAssemblerMock'
                );
            case UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_ASSEMBLER_TRAIT:
                return new FileObject(
                    $this->baseNamespace . 'BusinessRules\UseCases\\' . $domain . '\DTO\Response\\' . $entity . 'ResponseAssemblerTrait'
                );

            default:
                throw new InvalidArgumentException($type);
        }
    }
}
