<?php

namespace Pink\MarginStock;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;
use PhpOffice\PhpSpreadsheet\Exception as SpreadsheetException;

class Parser
{
    public function parse(MarginStockFilePath $filePath): array
    {
        $indexSheet = null;

        try {
            $sheet = IOFactory::load($filePath->get());
            $indexSheet = $sheet->getSheet($sheet->getSheetCount() - 1);
        } catch (ReaderException|SpreadsheetException $e) {
            throw new \RuntimeException("failed to load xls file", $e->getCode(), $e);
        }

        $converted =  array_map(function (array $record) {
            if (!is_numeric(trim($record[0]))) {
                return null;
            }

            return new Entity(
                trim($record[0]),
                $record[1],
                $record[2],
                $record[3],
                $record[4]
            );
        }, $indexSheet->toArray());

        return $this->removeNulls($converted);
    }

    private function removeNulls(array $converteds): array
    {
        return array_values(array_filter($converteds));
    }
}
