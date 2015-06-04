<?php

namespace RcmErrorHandler\ViewHelper;

require_once __DIR__ . '/../autoload.php';

class HeadScriptWithErrorHandlerFirstTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $unit = new HeadScriptWithErrorHandlerFirst();

        $this->assertTrue(is_string($unit->toString()));
    }
}
