<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\GenerateGenerator\Impl;

use OpenClassrooms\CodeGenerator\Commands\ConstructionPatternType;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\GenerateGenerator\DTO\Request\GenerateGeneratorGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator\GenerateGeneratorMediator;
use OpenClassrooms\CodeGenerator\Mediators\GenerateGenerator\Impl\GenerateGeneratorMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator\GenerateGeneratorFileObjectsStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GenerateGeneratorGeneratorMock;
use PHPUnit\Framework\TestCase;

class GenerateGeneratorMediatorImplTest extends TestCase
{
    /**
     * @var GenerateGeneratorMediator
     */
    private $mediator;

    /**
     * @test
     */
    public function mediate_ReturnFileObject(): void
    {
        $expectedFileObjects = $this->mediator->mediate(
            [
                Args::DOMAIN => 'Api\ViewModels',
                Args::ENTITY => 'FunctionalEntity',
            ],
            [
                Options::DUMP                 => false,
                Options::CONSTRUCTION_PATTERN => ConstructionPatternType::BUILDER_PATTERN,
            ]
        );

        $this->assertIsArray( $expectedFileObjects);
        $this->assertNotEmpty($expectedFileObjects);
        foreach ($expectedFileObjects as $fileObject) {
            $this->assertInstanceOf(FileObject::class, $fileObject);
        }
    }

    protected function setUp(): void
    {
        $this->mediator = new GenerateGeneratorMediatorImpl();
        $selfGeneratorFileObjectsStub1 = new GenerateGeneratorFileObjectsStub1();

        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->mediator->setGenerateGeneratorGenerator(
            new GenerateGeneratorGeneratorMock($selfGeneratorFileObjectsStub1::$fileObjects)
        );
        $this->mediator->setGenerateGeneratorGeneratorRequestBuilder(
            new GenerateGeneratorGeneratorRequestBuilderImpl()
        );
    }
}
