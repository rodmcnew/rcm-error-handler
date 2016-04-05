<?php

namespace RcmErrorHandler\Model;

/**
 * Interface GenericErrorInterface
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
interface GenericErrorInterface
{
    /**
     * getMessage
     *
     * @return string
     */
    public function getMessage();

    /**
     * getCode
     *
     * @return int
     */
    public function getCode();

    /**
     * getSeverity
     *
     * @return int
     */
    public function getSeverity();

    /**
     * getFile
     *
     * @return string
     */
    public function getFile();

    /**
     * getLine
     *
     * @return int
     */
    public function getLine();

    /**
     * getType
     *
     * @return string
     */
    public function getType();

    /**
     * getPrevious
     *
     * @return GenericErrorInterface
     */
    public function getPrevious();

    /**
     * getFirst
     *
     * @return GenericErrorInterface
     */
    public function getFirst();

    /**
     * getErrors
     *
     * @param GenericErrorInterface $error
     * @param array                 $errors
     *
     * @return array
     */
    public function getErrors(GenericErrorInterface $error, $errors = []);

    /**
     * getTrace
     *
     * @param int $options
     * @param int $limit
     *
     * @return array
     */
    public function getTrace($options = 3, $limit = 0);

    /**
     * addDetails
     *
     * @param array $details
     *
     * @return void
     */
    public function addDetails(array $details);

    /**
     * getDetails
     *
     * @return array
     */
    public function getDetails();
}
