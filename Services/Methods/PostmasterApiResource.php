<?php

namespace ML\PostMasterBundle\Services\Methods;

use ML\PostMasterBundle\Services\Methods\PostmasterObject as PM_Object;
/*
* Base class for Postmaster API Objects.
*/
abstract class PostmasterApiResource extends PM_Object
{
	/*
	* Get path that should be used to communicate with API.
	*/
	public function instanceUrl($base, $action=null)
	{
		$id = $this['id'];
		if(is_float($id))
			$id = sprintf("%.0f", $id);
			$class = get_class($this);
		if (!$id) {
			throw new PostmasterError("Could not determine which URL to request: $class instance has invalid ID: $id", null);
		}
			$id = PostmasterApiRequestor::utf8($id);
			$extn = urlencode($id);
		if ($action) {
			return "$base/$extn/$action";
		}
			return "$base/$extn";
		}


		protected static function _validateParams($params=null)
		{
			if ($params && !is_array($params))
			throw new PostmasterError("You must pass an array as the first argument to Postmaster API method calls.");
		}
}