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


class PostmasterTransitTimes extends PostmasterApiResource
{
	private static $urlBase = '/v1/times';
	/*
	* Ask for the time to transport a shipment between two zip codes.
	*/
	public static function get($params=null)
	{
		$class = get_class();
		PostmasterApiResource::_validateParams($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('post', self::$urlBase, $params);
		$results = array();
		foreach($response['services'] as $data) {
		$class = 'PostmasterTransitTime';

		array_push($results, PostmasterObject::scopedConstructObject($class, $data));
		}
		return $results;
	}
}