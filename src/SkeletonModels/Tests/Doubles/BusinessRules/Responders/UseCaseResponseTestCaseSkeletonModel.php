<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

abstract class UseCaseResponseTestCaseSkeletonModel extends AbstractSkeletonModel
{
    public $templatePath = 'Tests/Doubles/BusinessRules/Responders/UseCaseResponseTestCase.php.twig';

    public $useCaseResponseClassName;

    public $useCaseResponseMethods;

    public $useCaseResponseShortName;
}
