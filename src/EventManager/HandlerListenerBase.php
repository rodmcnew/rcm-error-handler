<?php

namespace RcmErrorHandler\EventManager;

use \RcmErrorHandler\Model\Config;

/**
 * Class HandlerListenerBase
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
class HandlerListenerBase implements HandlerListenerInterface
{

    /**
     * @var Config
     */
    public $options;

    /**
     * HandlerListenerBase constructor.
     *
     * @param Config $options
     */
    public function __construct(
        Config $options
    ) {
        $this->options = $options;
    }

    /**
     * update
     *
     * @param \Zend\EventManager\Event $event
     *
     * @return void
     */
    public function update(\Zend\EventManager\Event $event)
    {
    }
}
