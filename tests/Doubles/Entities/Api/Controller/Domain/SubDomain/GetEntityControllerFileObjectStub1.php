<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class GetEntityControllerFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain\GetFunctionalEntityController';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Api/Controller/Domain/SubDomain/GetFunctionalEntityController.php';
        $this->className = self::CLASS_NAME;
    }
}
