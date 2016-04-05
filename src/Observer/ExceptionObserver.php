<?php

namespace RcmErrorHandler\Observer;

use RcmErrorHandler\Model\GenericErrorInterface;

/**
 * Class GenericErrorBuilder
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
interface ExceptionObserver
{
    /**
     * update
     *
     * @param GenericErrorInterface $genericError
     * @param \Exception            $exception
     *
     * @return void
     */
    public function update(GenericErrorInterface $genericError, \Exception $exception);
}
