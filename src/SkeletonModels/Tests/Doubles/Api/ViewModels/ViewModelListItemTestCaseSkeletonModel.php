<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
abstract class ViewModelListItemTestCaseSkeletonModel extends AbstractSkeletonModel
{
    /**
     * @var string
     */
    public $templatePath = 'Tests/Doubles/Api/ViewModels/ViewModelListItemTestCase.php.twig';

    /**
     * @var string
     */
    public $viewModelListItemClassName;

    /**
     * @var string
     */
    public $viewModelListItemShortName;

    /**
     * @var string
     */
    public $viewModelTestCaseShortName;
}
