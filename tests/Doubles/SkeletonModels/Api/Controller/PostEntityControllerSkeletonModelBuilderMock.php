<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl\PostEntityControllerSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;

class PostEntityControllerSkeletonModelBuilderMock extends PostEntityControllerSkeletonModelBuilderImpl
{
    public function __construct()
    {
        $this->setAbstractControllerClassName(FixturesConfig::ABSTRACT_CONTROLLER);
    }
}
