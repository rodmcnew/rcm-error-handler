<?php


namespace RcmErrorHandler\Test\Log;

use RcmErrorHandler\Log\VarDumpErrorLogger;

require_once __DIR__ . '/../autoload.php';

/**
 * Class VarDumpErrorLoggerTest
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Test\Log
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright ${YEAR} Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class VarDumpErrorLoggerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testCase
     *
     * @return void
     */
    public function testCase()
    {
        $unit = new VarDumpErrorLogger();

        $this->assertInstanceOf(
            '\RcmErrorHandler\Log\VarDumpErrorLogger',
            $unit->log(1, 'TEST MESSAGE')
        );
    }
}
