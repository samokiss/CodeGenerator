<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class ViewModelListItemAssemblerImplTestSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Api/ViewModels/Impl/ViewModelListItemAssemblerImplTest.php.twig';

    /**
     * @var string
     */
    public $useCaseListItemResponseStubClassName;

    /**
     * @var string
     */
    public $useCaseListItemResponseStubShortName;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerClassName;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerImplClassName;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerImplShortName;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerImplTestNamespace;

    /**
     * @var string
     */
    public $viewModelListItemAssemblerShortName;

    /**
     * @var FieldObject[]
     */
    public $viewModelListItemFields;

    /**
     * @var string
     */
    public $viewModelListItemStubClassName;

    /**
     * @var string
     */
    public $viewModelListItemStubShortName;

    /**
     * @var string
     */
    public $viewModelListItemTestCaseClassName;

    /**
     * @var string
     */
    public $viewModelListItemTestCaseMethod;

    /**
     * @var string
     */
    public $viewModelListItemTestCaseShortName;
}
