<?php

namespace RcmErrorHandler\Model;

/**
 * Class BasicErrorResponse
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Model
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright ${YEAR} Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class BasicErrorResponse
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
     * BasicErrorResponse constructor.
     *
     * @param string $message
     * @param int    $code
     */
    public function __construct($message, $code = 0)
    {
        $this->code = $code;
        $this->message = $message;
    }
}
