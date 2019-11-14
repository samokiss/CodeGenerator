<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomServiceXmlFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Resources\config\Generator\GenerateGenerator\custom.xml';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Resources/config/Generator/GenerateGenerator/AssemblerPattern/custom.xml';
        $this->className = self::CLASS_NAME;
    }
}
