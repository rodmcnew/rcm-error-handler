<?php

namespace RcmErrorHandler\Log;

use Zend\Log\Logger;
use Zend\ServiceManager\ServiceLocatorInterface;

 /**
 * VarDumpErrorLogger.php
 *
 * LongDescHere
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   moduleNameHere
 * @author    author Brian Janish <bjanish@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      https://github.com/reliv
 */

class VarDumpErrorLogger extends AbstractErrorLogger
{

    /**
     * Add a message as a log entry
     *
     * @param  int $priority
     * @param  mixed $message
     * @param  array|Traversable $extra
     *
     * @return Logger
     */
    public function log($priority, $message, $extra = [])
    {
        var_dump($priority, $message);

        return $this;
    }
}
