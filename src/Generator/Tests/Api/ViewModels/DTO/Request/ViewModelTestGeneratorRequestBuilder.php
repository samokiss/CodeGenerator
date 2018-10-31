<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestGeneratorRequestBuilder
{
    public function create(): ViewModelTestGeneratorRequestBuilder;

    public function build(): ViewModelTestGeneratorRequest;
}
