<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface PatchEntityModelGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
