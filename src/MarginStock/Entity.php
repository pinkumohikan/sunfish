<?php

namespace Pink\MarginStock;

class Entity
{
    /** @var string */
    public $code;

    /** @var string */
    public $name;

    /** @var string */
    public $groupType;

    /** @var int */
    public $tradeUnit;

    /** @var string */
    public $marginType;

    public function __construct(string $code, string $name, string $groupType, int $tradeUnit, string $marginType)
    {
        $this->code = $code;
        $this->name = $name;
        $this->groupType = $groupType;
        $this->tradeUnit = $tradeUnit;
        $this->marginType = $marginType;
    }
}
