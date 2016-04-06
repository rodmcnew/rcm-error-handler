<?php

namespace RcmErrorHandler\Model;

/**
 * Interface GenericExceptionInterface
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Model
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt
 * @version   Release: <package_version>
 * @link      https://github.com/reliv\
 */
interface GenericExceptionInterface extends GenericErrorInterface
{
    /**
     * setException
     *
     * @param \Exception $exception
     *
     * @return void
     */
    public function setException(\Exception $exception);

    /**
     * getException
     *
     * @return \Exception
     */
    public function getException();
}
