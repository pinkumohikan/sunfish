<?php

namespace Pink\MarginStock;

class MarginStockFilePath {
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function __destruct()
    {
        unlink($this->path);
    }

    public function get(): string
    {
        return $this->path;
    }
}
