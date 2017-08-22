<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl\ViewModelDetailGeneratorImpl;
use OpenClassrooms\CodeGenerator\Generator\App\ViewModels\Impl\ViewModelGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ViewModelClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @test
     */
    public function generate()
    {
        $actual = $this->generator->generate(EntityDetailResponseDTO::class);
        $this->assertSame(
            [
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Entity',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetail',
                'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\Impl\EntityDetailImpl'
            ],
            array_keys($actual)
        );
        $actual = array_values($actual);
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/Entity.php'
        );
        $this->assertSame($expected, $actual[0]);

        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/EntityDetail.php'
        );
        $this->assertSame($expected, $actual[1]);

        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/ViewModels/Web/Domain/SubDomain/Impl/EntityDetailImpl.php'
        );
        $this->assertSame($expected, $actual[2]);

    }

    protected function setUp()
    {
        $this->generator = new ViewModelDetailGeneratorImpl();
        $this->generator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        /** @var \OpenClassrooms\CodeGenerator\Generator\App\ViewModels\ViewModelGenerator $viewModelGenerator */
        /** @var ViewModelGeneratorImpl $viewModelGenerator */
        $viewModelGenerator = $this->buildGenerator(new ViewModelGeneratorImpl());
        $viewModelGenerator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        $this->generator->setViewModelGenerator($viewModelGenerator);
        parent::setUp();
    }
}