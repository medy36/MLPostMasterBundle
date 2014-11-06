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


abstract class Postmaster
{
	public static $apiKey = null;
	public static $apiBase = 'https://api.postmaster.io';
	const VERSION = '1.3.1';

	public static function getApiKey()
	{
		if (!is_string(self::$apiKey))
		throw new PostmasterError('API key not set. Call "Postmaster::setApiKey(<apiKey>);" before using API.');
		return self::$apiKey;
	}

	public static function setApiKey($apiKey)
	{
		self::$apiKey = $apiKey;
	}
}