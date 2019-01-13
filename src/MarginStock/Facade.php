<?php

namespace Pink\MarginStock;

use GuzzleHttp\Client;

class Facade
{
    private $downloader;
    private $parser;

    public function __construct(Downloader $downloader, Parser $parser)
    {
        $this->downloader = $downloader;
        $this->parser = $parser;
    }

    public static function create(): self
    {
        return new self(new Downloader(new Client()), new Parser());
    }

    /**
     * @return Entity[]
     */
    public function fetch(): array
    {
        $xlsPath = $this->downloader->download();

        return $this->parser->parse($xlsPath);
    }
}