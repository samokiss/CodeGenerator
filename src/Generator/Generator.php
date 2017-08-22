<?php

namespace OpenClassrooms\CodeGenerator\Generator;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
interface Generator
{
    const USE_CASE_GET = 'use case get';

    const USE_CASE_GET_ALL = 'use case get all';

    const ADMIN = 'admin';

    /**
     * @return string[]
     */
    public function generate(string $className, array $parameters = []): array;
}
