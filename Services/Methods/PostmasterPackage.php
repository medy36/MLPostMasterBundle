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

use ML\PostMasterBundle\Services\Methods\PostmasterApiResource;

class PostmasterPackage extends PostmasterApiResource
{

	private static $urlBase = '/v1/packages';

	public static function create($params=null)
	{
		$class = get_class();
		PostmasterApiResource::_validateParams($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('post', self::$urlBase, $params);
		return $response['id'];
	}

	public static function all($params=null)
	{
		$class = get_class();
		PostmasterApiResource::_validateParams($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('get', self::$urlBase, $params);
		$results = array();
		foreach($response['results'] as $data) {
		array_push($results, PostmasterObject::scopedConstructObject($class, $data));
	    }
	    return $results;
	}

	public static function fit($params=null)
	{
		$requestor = new PostmasterApiRequestor();
		$params = json_encode($params);
		$headers = array("Content-Type: application/json");
		$response = $requestor->request('post', self::$urlBase.'/fit', $params, $headers);
		return $response;
	}
}