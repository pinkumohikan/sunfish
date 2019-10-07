<?php

namespace Pink\MarginStock;

class MarginStockFile {
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function __destruct()
    {
        unlink($this->path);
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
