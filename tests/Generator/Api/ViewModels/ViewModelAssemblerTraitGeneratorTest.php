<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModelAssemblerTraits;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelAssemblerTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelAssemblerTraitGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelAssemblerTraitSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelAssemblerTrait\ViewModelAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

class ViewModelAssemblerTraitGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelAssemblerTraitGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelAssemblerTraitGenerator
     */
    private $viewModelAssemblerTraitGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelAssemblerTraitGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelAssemblerTraitFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $viewModelAssemblerTraitGeneratorRequestBuilder = new ViewModelAssemblerTraitGeneratorRequestBuilderImpl();
        $this->request = $viewModelAssemblerTraitGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelAssemblerTraitGenerator = new ViewModelAssemblerTraitGenerator();
        $this->buildViewModelGenerator($this->viewModelAssemblerTraitGenerator);

        $this->viewModelAssemblerTraitGenerator->setViewModelAssemblerTraitSkeletonModelAssembler(
            new ViewModelAssemblerTraitSkeletonModelAssemblerImpl()
        );
    }
}
