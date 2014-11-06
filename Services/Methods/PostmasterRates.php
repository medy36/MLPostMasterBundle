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


class PostmasterRates extends PostmasterApiResource
{
private static $urlBase = '/v1/rates';
/*
* Ask for the cost to ship a package between two zip codes.
*/
public static function get($params=null)
{
$class = get_class();
PostmasterApiResource::_validateParams($params);
$requestor = new PostmasterApiRequestor();
$response = $requestor->request('post', self::$urlBase, $params);
return PostmasterObject::scopedConstructObject($class, $response);
}
}