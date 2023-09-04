<?php

namespace Nwidart\Modules\Support\Config;

class GeneratorPath
{
    private $path;
    private $generate;
    private $namespace;
    private $customPath;
    public function __construct($config)
    {
        if (is_array($config)) {
            $this->path = $config['path'];
            $this->generate = $config['generate'];
            $this->namespace = $config['namespace'] ?? $this->convertPathToNamespace($config['path']);
            $this->customPath = $config['customPath'] ?? false;
            return;
        }
        $this->path = $config;
        $this->generate = (bool) $config;
        $this->namespace = $config;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function generate(): bool
    {
        return $this->generate;
    }

    public function getNamespace()
    {
        return $this->namespace;
    }
    public function customPath()
    {
        return $this->customPath;
    }

    private function convertPathToNamespace($path)
    {
        return str_replace('/', '\\', $path);
    }
}
