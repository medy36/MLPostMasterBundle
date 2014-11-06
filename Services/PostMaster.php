<?php

/*
 * This file is part of the MZ\MailChimpBundle
 *
 * (c) Mehdi Lasri <lasri.mehdi@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ML\PostMasterBundle\Services;

use ML\PostMasterBundle\Services\Methods\Postmaster as PM;

/**
 * Mailchimp
 *
 * @author Mehdi Lasri <lasri.mehdi@gmail.com>
 */
class PostMaster
{

    private $apiKey;


    /**
     * Initializes MailChimp
     *
     * @param string $apiKey Mailchimp api key
     * @param string $listId Default mailing list id
     */
    public function __construct($apiKey)
    {

        PM::setApikey($apiKey);
        $this->apiKey = $apiKey;

        $key = preg_split("/-/", $this->apiKey);
        

        if (!function_exists('curl_init')) {
            throw new \Exception('This bundle needs the cURL PHP extension.');
        }
    }

    /**
     * Get PostMaster api key
     *
     * @return string
     */
    public function getAPIkey()
    {
        return $this->apiKey;
    }   


    /**
     * Validate Address
     *
     * @return Methods\PostmasterAddressValidation
     */
    public function getAddressValidation()
    {
        return new Methods\PostmasterAddressValidation($this->apiKey);
    }

    /**
     * Get TransitTime
     *
     * @return Methods\PostmasterTransitTimes
     */
    public function getTransitTimes()
    {
        return new Methods\PostmasterTransitTimes($this->apiKey);
    }

    /**
     * Get Rates
     *
     * @return Methods\PostmasterRates
     */
    public function getRates()
    {
        return new Methods\PostmasterRates($this->apiKey);
    }

    /**
     * Get Shipment
     *
     * @return Methods\PostmasterShipment
     */
    public function getShipment()
    {
        return new Methods\PostmasterShipment($this->apiKey);
    }

    /**
     * Get Tracking
     *
     * @return Methods\PostmasterTracking
     */
    public function getTracking()
    {
        return new Methods\PostmasterTracking($this->apiKey);
    }

    /**
     * Get Package
     *
     * @return Methods\PostmasterPackage
     */
    public function getPackage()
    {
        return new Methods\PostmasterPackage($this->apiKey);
    }




  
}
