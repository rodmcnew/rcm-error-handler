<?php


namespace RcmErrorHandler\Test\Log;

use RcmErrorHandler\Log\PhpErrorLogger;

require_once __DIR__ . '/../autoload.php';

/**
 * Class PhpErrorLoggerTest
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
class PhpErrorLoggerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testCase
     *
     * @return void
     */
    public function testCase()
    {
        $unit = new PhpErrorLogger();

        $this->assertInstanceOf(
            '\RcmErrorHandler\Log\PhpErrorLogger',
            $unit->log(1, 'UNIT TEST MESSAGE from PhpErrorLoggerTest')
        );
    }
}
