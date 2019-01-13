<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$facade = \Pink\MarginStock\Facade::create();
var_dump($facade->fetch());
