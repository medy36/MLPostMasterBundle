<?php

/*
 * This file is part of the MZ\MailChimpBundle
 *
 * (c) Miguel Perez <miguel@mlpz.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ML\PostMasterBundle\Services\Methods;

use ML\PostMasterBundle\Services\Methods\PostmasterApiResource as HttpClient;

/**
 * Mailchimp List method
 *
 * @author Mehdi Lasri <lasri.mehdi@gmail.com>
 * @link   https://www.postmaster.io/docs/api#shipments
 */
class PostmasterShipment extends HttpClient
{
	 private static $urlBase = '/v1/shipments';
	/*
	* Create a new shipment.
	* Arguments:
	* - to (required) - an array representing the ship-to address:
	* - company
	* - contact
	* - street - a list of strings defining the street address
	* - city
	* - state
	* - zip
	* - package (required) - an array (or list of arrays) representing
	* the package:
	* - value
	* - weight
	* - dimentions
	* - from (optional) - an array representing the ship-from address.
	* Will use default for account if not provided.
	*/
	public static function create($params=null)
	{
		$class = get_class();
		PostmasterUtil::normalizeAddress($params['to']);
		PostmasterUtil::normalizeAddress($params['from_']);
		PostmasterApiResource::_validateParams($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('post', self::$urlBase, $params);
		return PostmasterObject::scopedConstructObject($class, $response);
	}


	public static function all($params=null)
	{
		$class = get_class();
		PostmasterApiResource::_validateParams($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('get', self::$urlBase, $params);
		$results = array();
		foreach($response['results'] as $data)
		array_push($results, PostmasterObject::scopedConstructObject($class, $data));
		return $results;
	}
	public function refresh()
	{
		$requestor = new PostmasterApiRequestor();
		$url = $this->instanceUrl(self::$urlBase);
		$response = $requestor->request('get', $url);
		$this->setValues($response);
		return $this;
	}

	/*
	* Retrieve a package by ID.
	*/
	public static function retrieve($id)
	{
		$instance = new PostmasterShipment($id);
		$instance->refresh();
		return $instance;
	}

	/*
	* Void a shipment (from an object).
	*/
	public function void()
	{
		$requestor = new PostmasterApiRequestor();
		$url = $this->instanceUrl(self::$urlBase, 'void');
		$response = $requestor->request('post', $url);
		$this->setValues(array()); //clear
		return $response['message'] == 'OK';
	}
	
	/*
	* Track a shipment (from an object).
	*/
	public function track()
	{
		$requestor = new PostmasterApiRequestor();
		$url = $this->instanceUrl(self::$urlBase, 'track');
		$response = $requestor->request('get', $url);
		$class = 'Postmaster_Tracking';
		$results = array();
		foreach($response['results'] as $data)
		array_push($results, PostmasterObject::scopedConstructObject($class, $data));
		return $results;
	}

    
    
   

}

