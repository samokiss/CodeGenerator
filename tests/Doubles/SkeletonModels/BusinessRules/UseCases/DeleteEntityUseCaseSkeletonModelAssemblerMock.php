<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl\DeleteEntityUseCaseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class DeleteEntityUseCaseSkeletonModelAssemblerMock extends DeleteEntityUseCaseSkeletonModelAssemblerImpl
{
    public function __construct()
    {
        $this->setSecurityClassName(FixturesConfig::SECURITY);
        $this->setTransactionClassName(FixturesConfig::TRANSACTION);
        $this->setUseCaseClassName(FixturesConfig::USE_CASE);
        $this->setUseCaseRequestClassName(FixturesConfig::USE_CASE_REQUEST);
    }
}
