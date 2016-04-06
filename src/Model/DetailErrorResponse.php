<?php

namespace RcmErrorHandler\Model;

 /**
 * Class Error
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Model
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */

class DetailErrorResponse
{

    /**
     * @var int
     */
    public $code = 0;

    /**
     * @var string
     */
    public $message = '';

    /**
     * @var string
     */
    public $file = '';

    /**
     * @var int
     */
    public $line = 0;

    /**
     * @var array
     */
    public $backtrace = [];

    /**
     * DetailErrorResponse constructor.
     *
     * @param string $message
     * @param int    $code
     * @param string $file
     * @param int    $line
     * @param array  $backtrace
     */
    public function __construct(
        $message = 'Internal Server Error',
        $code = 0,
        $file = '',
        $line = 0,
        $backtrace = []
    ) {
        $this->code = $code;
        $this->message = $message;
        $this->file = $file;
        $this->line = $line;
        $this->backtrace = $backtrace;
    }
}
