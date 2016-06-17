<?php

namespace RcmErrorHandler\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class ApiClientErrorLoggerController
 *
 * ApiClientErrorLoggerController
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   moduleNameHere
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class ApiClientErrorLoggerController extends AbstractRestfulController
{
    /**
     * getLoggerConfig
     *
     * @return array
     */
    protected function getLoggerConfig()
    {
        $serviceLocator = $this->getServiceLocator();
        $config = $serviceLocator->get('\RcmErrorHandler\Config');

        $configs = $config->get('jsLogConfig', []);

        if (empty($configs)) {
            return [];
        }

        return $configs;
    }

    /**
     * doLog
     *
     * @param string $message
     * @param array  $extra
     *
     * @return void
     */
    protected function doLog($message, $extra = [])
    {
        $loggerConfig = $this->getLoggerConfig();
        $serviceLocator = $this->getServiceLocator();

        foreach ($loggerConfig['jsLoggers'] as $serviceName) {
            if ($serviceLocator->has($serviceName)) {
                /** @var \Zend\Log\LoggerInterface $logger */
                $logger = $serviceLocator->get($serviceName);
                $logger->err($message, $extra);
            }
        }
    }

    /**
     * getDataValue
     *
     * @param array  $data
     * @param string $key
     * @param null   $default
     *
     * @return null
     */
    protected function getDataValue($data, $key, $default = null)
    {
        if (isset($data[$key])) {
            return $data[$key];
        }

        return $default;
    }

    /**
     * prepareMessage
     *
     * @param array $data
     *
     * @return string
     */
    protected function prepareMessage($data)
    {
        $message = $this->getDataValue($data, 'type', 'ClientError') . ' - ' .
            $this->getDataValue($data, 'message', '(no message)') . ' - ' .
            $this->getDataValue($data, 'file', 'UNKNOWN FILE');

        return $message;
    }

    /**
     * create
     *
     * @param mixed $data
     *   $data = [
     *   'message' => 'some message',
     *   'file' => '/some/url',
     *   'line' => 123,
     *   'description' => 'Some Description',
     *   'trace' => '1# Some trace string'
     *   'type' => 'ClientError'
     *   ];
     *
     * @return JsonModel
     */
    public function create($data)
    {
        if ($this->isValidRoute($data) && $this->canLogErrors()) {
            $this->doLog($this->prepareMessage($data), $data);
        }

        $view = new JsonModel([]);

        return $view;
    }

    /**
     * isValidRoute
     *
     * @param mixed $data
     *
     *  $data = [
     *   'message' => 'some message',
     *   'file' => '/some/url',
     *   'line' => 123,
     *   'description' => 'Some Description',
     *   'trace' => '1# Some trace string'
     *   'type' => 'ClientError'
     *  ];
     *
     * @return boolean
     */
    public function isValidRoute($data)
    {
        $routeUrl = $this->getDataValue($data, 'file');

        $loggerConfig = $this->getLoggerConfig();

        $validRoutes = $loggerConfig['options']['validRoutes'];

        if (empty($validRoutes)) {
            // default is all
            return true;
        }

        foreach ($validRoutes as $routes) {
            /* add routes to match in config using regex  */
            if (preg_match($routes, $routeUrl) != 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * canLogErrors
     *
     * @return boolean
     */
    public function canLogErrors()
    {
        $loggerConfig = $this->getLoggerConfig();

        return $loggerConfig['options']['logJsErrors'];
    }


    public function getList()
    {
        return $this->getResponse()->setStatusCode(405);
    }

    public function get($id)
    {
        return $this->getResponse()->setStatusCode(405);
    }
}
