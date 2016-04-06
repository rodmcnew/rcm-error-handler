<?php

namespace RcmErrorHandler\Format;

use RcmErrorHandler\Model\BasicErrorResponse;
use RcmErrorHandler\Model\DetailErrorResponse;
use RcmErrorHandler\Model\GenericErrorInterface;
use Zend\Http\Response;
use Zend\View\Model\JsonModel;

/**
 * Class FormatJson
 *
 *
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
class FormatJson extends FormatBase
{
    /**
     * getString
     *
     * @param GenericErrorInterface $error
     *
     * @return mixed
     */
    public function getString(GenericErrorInterface $error)
    {
        $firstError = $error->getFirst();

        $data = new DetailErrorResponse(
            $firstError->getMessage(),
            $firstError->getCode(),
            $firstError->getFile(),
            $firstError->getLine(),
            $firstError->getTrace()
        );

        return $this->getResponse($data);
    }

    /**
     * getBasicString - no details exposed - public friendly
     *
     * @param GenericErrorInterface $error
     *
     * @return mixed
     */
    public function getBasicString(GenericErrorInterface $error)
    {
        $firstError = $error->getFirst();

        $data = new BasicErrorResponse(
            parent::getBasicString($firstError),
            $firstError->getCode()
        );

        return $this->getResponse($data);
    }

    /**
     * getTraceString
     *
     * @param GenericErrorInterface $error
     * @param int          $options
     * @param int          $limit
     *
     * @return mixed
     */
    public function getTraceString(GenericErrorInterface $error, $options = 3, $limit = 0)
    {
        $firstError = $error->getFirst();
        $data = $firstError->getTrace();

        return $this->getResponse($data);
    }

    /**
     * @codeCoverageIgnore
     * displayString
     *
     * @param GenericErrorInterface       $error
     * @param \Zend\Mvc\MvcEvent $event
     *
     * @return void
     */
    public function displayString(GenericErrorInterface $error, \Zend\Mvc\MvcEvent $event)
    {
        $this->display($this->getString($error), $event);
    }

    /**
     * @codeCoverageIgnore
     * displayBasicString
     *
     * @param GenericErrorInterface       $error
     * @param \Zend\Mvc\MvcEvent $event
     *
     * @return void
     */
    public function displayBasicString(GenericErrorInterface $error, \Zend\Mvc\MvcEvent $event)
    {
        $this->display($this->getBasicString($error), $event);
    }

    /**
     * @codeCoverageIgnore
     * displayTraceString
     *
     * @param GenericErrorInterface       $error
     * @param \Zend\Mvc\MvcEvent $event
     *
     * @return void
     */
    public function displayTraceString(GenericErrorInterface $error, \Zend\Mvc\MvcEvent $event)
    {
        $this->display($this->getTraceString($error), $event);
    }

    /**
     * @codeCoverageIgnore
     * display
     *
     * @param string             $content
     * @param \Zend\Mvc\MvcEvent $event
     *
     * @return void
     */
    public function display($content, \Zend\Mvc\MvcEvent $event)
    {
        $view = new JsonModel();
        $view->setTerminal(true);

        $event->setViewModel($view);

        /** @var Response $response */
        $response = $event->getResponse();
        $response->getHeaders()->clearHeaders();

        $this->setResponseHeaders();
        $response->setStatusCode(Response::STATUS_CODE_500);
        $response->getHeaders()->addHeaders(
            [
                'Content-Type' => 'application/json'
            ]
        );

        $response->setContent('');

        $response->getContent();

        $this->setResponseHeaders();

        echo $content;
        exit(0);
    }

    /**
     * getResponse
     *
     * @param $data
     *
     * @return string
     */
    protected function getResponse($data)
    {
        return json_encode($data);
    }

    /**
     * @codeCoverageIgnore
     * setResponseHeaders
     *
     * @return void
     */
    protected function setResponseHeaders()
    {
        // we suppress so that there are not issues if output is already set
        @http_response_code(500);
        @header("HTTP/1.0 500 Internal Server Error");
        @header('Content-Type: application/json');
    }
}
