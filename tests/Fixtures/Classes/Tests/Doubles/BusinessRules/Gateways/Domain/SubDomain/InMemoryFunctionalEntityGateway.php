<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Gateways\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\EntityUtil;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\FunctionalEntityGateway;

class InMemoryFunctionalEntityGateway implements FunctionalEntityGateway
{
    /**
     * @var FunctionalEntity[]
     */
    public static $functionalEntities = [];

    /**
     * @var int
     */
    public static $id = 1;

    public function __construct(array $functionalEntities = [])
    {
        self::$functionalEntities = $functionalEntities;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id): FunctionalEntity
    {
        if (!isset(self::$functionalEntities[$id])) {
            throw new FunctionalEntityNotFoundException();
        }

        return self::$functionalEntities[$id];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(array $filters = [], array $sorts = [], array $pagination = []): iterable
    {
        return self::$functionalEntities;
    }

    public function insert(FunctionalEntity $functionalEntity): void
    {
        EntityUtil::setId($functionalEntity, self::$id);
        self::$functionalEntities[] = $functionalEntity;
    }

    public function update(FunctionalEntity $functionalEntity): void
    {
        $functionalEntity->update();
    }
}
