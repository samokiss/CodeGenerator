<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request;

use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;

interface EditEntityUseCaseRequestGeneratorRequest extends GeneratorRequest
{
    public function getEntityClassName(): string;
}
