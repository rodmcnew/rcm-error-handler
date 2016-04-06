<?php

namespace RcmErrorHandler\Model;

/**
 * Class GenericException
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class GenericException extends GenericError implements GenericExceptionInterface
{
    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * setException
     *
     * @param \Exception $exception
     *
     * @return void
     */
    public function setException(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * getException
     *
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }

}
