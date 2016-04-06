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
     * string DEFAULT_TYPE
     */
    const DEFAULT_TYPE = 'Unknown';
    
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
     * addContext
     *
     * @param array $context
     *
     * @return void
     */
    public function addContext(array $context);

    /**
     * getContext
     *
     * @return array
     */
    public function getContext();
}
