<?php

namespace Pink\MarginStock;

use GuzzleHttp\Client;

class Downloader
{
    const JPX_MARGIN_STOCK_XLS_URL = 'https://www.jpx.co.jp/listing/others/margin/tvdivq0000000od2-att/list.xls';

    private $guzzle;

    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function download(): MarginStockFile
    {
        $res = $this->guzzle->get(self::JPX_MARGIN_STOCK_XLS_URL);

        $xlsFile = tempnam('/tmp', 'jpx-margin-stock-');
        $file = new \SplFileObject($xlsFile, 'w');
        $file->fwrite($res->getBody()->getContents());

        return new MarginStockFile($file->getPathname());
    }
}


