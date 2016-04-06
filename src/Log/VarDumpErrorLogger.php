<?php

namespace RcmErrorHandler\Log;

use Zend\Log\Logger;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * VarDumpErrorLogger.php
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
     * @param  int                $priority
     * @param  mixed              $message
     * @param  array|\Traversable $extra
     *
     * @return Logger
     */
    public function log($priority, $message, $extra = [])
    {
        if (extension_loaded('xdebug')) {
            ini_set('xdebug.var_display_max_depth', 4);
        }
        echo '<pre>';
        var_dump('priority:');
        var_dump($priority);
        var_dump('message:');
        var_dump($message);
        if (isset($extra['trace'])) {
            var_dump('trace:');
            var_dump($extra['trace']);
        }
        if (isset($extra['exception'])) {
            var_dump($this->prepareException($extra['exception']));
        }
        echo '</pre>';

        return $this;
    }
}

