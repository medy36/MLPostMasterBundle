<?php


namespace ML\PostMasterBundle\Services\Methods;

abstract class PostmasterUtil
{
	public static function normalizeAddress(&$array)
	{
		if(is_array($array) && array_key_exists('address', $array)){
			$address = $array['address'];
			unset($array['address']);
		if(count($address) > 0)
			$array['line1'] = $address[0];
		if(count($address) > 1)
			$array['line2'] = $address[1];
		if(count($address) > 2)
			$array['line3'] = $address[2];
	    }
	}
}