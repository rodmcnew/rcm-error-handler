<?php

namespace RcmErrorHandler\Factory;

use RcmErrorHandler\Model\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class RcmErrorHandlerConfigFactory
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmErrorHandler\Factory
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright ${YEAR} Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class RcmErrorHandlerConfigFactory implements FactoryInterface
{
    /**
     * createService
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Config
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configRoot = $serviceLocator->get('Config');
        $configArray = $configRoot['RcmErrorHandler'];

        return new Config($configArray);
    }
}
