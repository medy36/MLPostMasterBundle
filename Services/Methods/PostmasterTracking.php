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


class PostmasterTracking extends PostmasterApiResource
{
	private static $urlBase = '/v1/track';

	/*
	* Track a package by carrier waybill (tracking number).
	*/
	public static function track($tracking_id)
	{
		$class = get_class();
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('get', self::$urlBase.'?tracking='.$tracking_id);
		return PostmasterObject::scopedConstructObject($class, $response);
	}

	/*
	* This allows you to monitor the status of packages that you created outside
	* of Postmaster.
	*/
	public static function monitor_external($params)
	{
		PostmasterApiResource::_validateParams($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('post', self::$urlBase, $params);
		return $response;
	}

	/**
	* Converts JSON response to Postmaster_Object/ExternalPackage.
	* This is a helper function for converting the initially returned
	* hook response if anything exists. All other responses should be
	* handled by the user's URL.
	* @param String $response JSON string.
	* @return Postmaster_Object Postmaster_Object result.
	*/
	public static function toPostmaster_ExternalPackage($response)
	{
		$class = 'Postmaster_ExternalPackage';
		return PostmasterObject::scopedConstructObject($class, $response);
	}
}