<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\SkeletonModels\AbstractSkeletonModel;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
abstract class GetFunctionalEntitySkeletonModel extends AbstractSkeletonModel
{
    public $functionalEntityArgument;

    public $functionalEntityClassName;

    public $functionalEntityDetailResponseAssemblerClassName;

    public $functionalEntityDetailResponseAssemblerShortName;

    public $functionalEntityGatewayClassName;

    public $functionalEntityGatewayShortName;

    public $functionalEntityNotFoundExceptionClassName;

    public $functionalEntityResponseClassName;

    public $functionalEntityResponseShortName;

    public $functionalEntityShortName;

    public $getFunctionalEntityRequestArgument;

    public $getFunctionalEntityRequestClassName;

    public $getFunctionalEntityRequestMethod;

    public $getFunctionalEntityRequestShortName;

    public $shortName;

    public $templatePath = 'BusinessRules/UseCases/GetFunctionalEntity.php.twig';

    public $useCaseClassName;

    public $useCaseRequestArgument;

    public $useCaseRequestClassName;

    public $useCaseRequestShortName;
}