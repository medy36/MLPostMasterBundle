<?php
namespace ML\PostMasterBundle\Services\Methods;


class PostmasterAddressValidation extends PostmasterApiResource
{
	private static $urlBase = '/v1/validate';
	/*
	* Validate that an address is correct.
	*/
	public static function validate($params=null)
	{
		
		$class = get_class();
		PostmasterApiResource::_validateParams($params);
		PostmasterUtil::normalizeAddress($params);
		$requestor = new PostmasterApiRequestor();
		$response = $requestor->request('post', self::$urlBase, $params);
		return PostmasterObject::scopedConstructObject($class, $response);
	}
}