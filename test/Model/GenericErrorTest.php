<?php

namespace RcmErrorHandler\Test\Model;

use RcmErrorHandler\Model\GenericError;
use RcmErrorHandler\Model\GenericErrorInterface;

require_once __DIR__ . '/../autoload.php';

/**
 * Class GenericErrorTest
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Test\Model
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class GenericErrorTest extends \PHPUnit_Framework_TestCase {

    public function test(){

        $genericError1 = new GenericError(
            'MESSAGE1',
            0,
            E_ERROR,
            'FILE1',
            1,
            null
        );

        $genericError = new GenericError(
            'MESSAGE',
            0,
            E_ERROR,
            'FILE',
            1,
            GenericErrorInterface::DEFAULT_TYPE,
            $genericError1
        );

        $message = $genericError->getMessage();

        $this->assertEquals('MESSAGE', $message);

        $code = $genericError->getCode();

        $this->assertEquals(0, $code);

        $severity = $genericError->getSeverity();

        $this->assertEquals(E_ERROR, $severity);

        $file = $genericError->getFile();

        $this->assertEquals('FILE', $file);

        $line = $genericError->getLine();

        $this->assertEquals(1, $line);

        $type = $genericError->getType();

        $this->assertEquals(GenericErrorInterface::DEFAULT_TYPE, $type);

        $previous = $genericError->getPrevious();

        $this->assertEquals($genericError1, $previous);

        $first = $genericError->getFirst();

        $this->assertEquals($genericError1, $first);

        $errors = $genericError->getErrors($genericError);

        $this->assertTrue(is_array($errors));

        $trace = $genericError->getTrace(3, 2);

        $this->assertTrue(is_array($trace));

    }
}
