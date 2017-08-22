<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Services;

use OpenClassrooms\CodeGenerator\Services\Impl\EntityClassObjectServiceImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EntityClassObjectServiceMock extends EntityClassObjectServiceImpl
{
    public function __construct()
    {
        $this->setAppNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src\App');
        $this->setBaseNamespace('OpenClassrooms\CodeGenerator\Tests\Doubles\src');
    }
}