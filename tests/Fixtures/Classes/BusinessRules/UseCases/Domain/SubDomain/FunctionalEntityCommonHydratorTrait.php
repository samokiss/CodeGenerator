<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

trait FunctionalEntityCommonHydratorTrait
{
    public function populateFromRequest(FunctionalEntity $functionalEntity, UseCaseRequest $request): void
    {
        !$request->isField1Updated() ?: $functionalEntity->setField1($request->getField1());
        !$request->isField2Updated() ?: $functionalEntity->setField2($request->getField2());
        !$request->isField3Updated() ?: $functionalEntity->setField3($request->isField3());
        !$request->isField4Updated() ?: $functionalEntity->setField4($request->getField4());
    }
}