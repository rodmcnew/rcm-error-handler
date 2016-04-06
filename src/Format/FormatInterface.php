<?php

namespace RcmErrorHandler\Format;

use RcmErrorHandler\Model\GenericErrorInterface;

/**
 * Class FormatInterface
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   moduleNameHere
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2014 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
interface FormatInterface
{
    /**
     * getString
     *
     * @param GenericErrorInterface $error
     *
     * @return string
     */
    public function getString(GenericErrorInterface $error);

    /**
     * getBasicString - no details exposed - public friendly
     *
     * @param GenericErrorInterface $error
     *
     * @return string
     */
    public function getBasicString(GenericErrorInterface $error);

    /**
     * getTraceString
     *
     * @param GenericErrorInterface $error
     * @param int                   $options
     * @param int                   $limit
     *
     * @return string
     */
    public function getTraceString(
        GenericErrorInterface $error,
        $options = 3,
        $limit = 0
    );

    /**
     * displayString
     *
     * @param GenericErrorInterface $error
     * @param \Zend\Mvc\MvcEvent    $event
     *
     * @return void
     */
    public function displayString(
        GenericErrorInterface $error,
        \Zend\Mvc\MvcEvent $event
    );

    /**
     * displayBasicString
     *
     * @param GenericErrorInterface $error
     * @param \Zend\Mvc\MvcEvent    $event
     *
     * @return void
     */
    public function displayBasicString(
        GenericErrorInterface $error,
        \Zend\Mvc\MvcEvent $event
    );

    /**
     * displayTraceString
     *
     * @param GenericErrorInterface $error
     * @param \Zend\Mvc\MvcEvent    $event
     *
     * @return void
     */
    public function displayTraceString(
        GenericErrorInterface $error,
        \Zend\Mvc\MvcEvent $event
    );
}
