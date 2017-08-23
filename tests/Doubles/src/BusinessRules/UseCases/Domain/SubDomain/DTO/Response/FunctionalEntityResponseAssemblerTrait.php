<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait FunctionalEntityResponseAssemblerTrait
{
    /**
     * @param \OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityResponseDTO|FunctionalEntityResponse $response
     */
    protected function hydrateCommonFields(FunctionalEntityResponse $response, FunctionalEntity $functionalEntity)
    {
        $response->id = $functionalEntity->getId();
        $response->field1 = $functionalEntity->getField1();
        $response->field2 = $functionalEntity->getField2();
        $response->field3 = $functionalEntity->isField3();
    }
}