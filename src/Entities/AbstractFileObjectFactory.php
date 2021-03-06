<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Entities;

abstract class AbstractFileObjectFactory
{
    /**
     * @var string
     */
    protected $apiDir;

    /**
     * @var string
     */
    protected $appDir;

    /**
     * @var string
     */
    protected $baseNamespace;

    /**
     * @var string
     */
    protected $stubNamespace;

    /**
     * @var string
     */
    protected $testsBaseNamespace;

    public function setBaseNamespace(string $baseNamespace)
    {
        $this->baseNamespace = $baseNamespace;
    }

    public function setApiDir(string $apiDir)
    {
        $this->apiDir = $apiDir;
    }

    public function setAppDir(string $appDir)
    {
        $this->appDir = $appDir;
    }

    public function setStubNamespace(string $stubNamespace)
    {
        $this->stubNamespace = $stubNamespace;
    }

    public function setTestsBaseNamespace(string $testsBaseNamespace)
    {
        $this->testsBaseNamespace = $testsBaseNamespace;
    }
}
