<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PutEntityModelGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
