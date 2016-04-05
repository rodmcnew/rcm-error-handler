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
interface ErrorObserver
{
    /**
     * update
     *
     * @param GenericErrorInterface $genericError
     * @param array                 $error
     *
     * @return void
     */
    public function update(GenericErrorInterface $genericError, array $error);
}
