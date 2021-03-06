<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Gateways\FileObject;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface FileObjectGateway
{
    public function insert(FileObject $fileObject);

    public function find(string $classname): ?FileObject;

    /**
     * @return FileObject
     */
    public function findAll(): array;

    public function flush();
}
