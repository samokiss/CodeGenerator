<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Entities\EntitiesMediator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Responses\UseCaseResponseCommonMediator;
use OpenClassrooms\CodeGenerator\Mediators\Options;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait CommonUseCaseGetMediatorsTrait
{
    /**
     * @var EntitiesMediator
     */
    private $entitiesMediator;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var UseCaseResponseCommonMediator
     */
    private $useCaseResponseCommonMediator;

    public function mediate(array $args = [], array $options = []): array
    {
        $className = $args[Args::CLASS_NAME];

        if (false !== $options[Options::NO_TEST]) {
            $fileObjects = $this->generateSources($className);
        } elseif (false !== $options[Options::TESTS_ONLY]) {
            $fileObjects = $this->generateTestSources($className);
        } else {
            $sourcesFileObjects = $this->generateSources($className);
            $testsFileObjects = $this->generateTestSources($className);
            $fileObjects = array_merge($sourcesFileObjects, $testsFileObjects);
        }
        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    public function setEntitiesMediator(EntitiesMediator $entitiesMediator): void
    {
        $this->entitiesMediator = $entitiesMediator;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setUseCaseResponseCommonMediator(UseCaseResponseCommonMediator $useCaseResponseCommonMediator): void
    {
        $this->useCaseResponseCommonMediator = $useCaseResponseCommonMediator;
    }
}
