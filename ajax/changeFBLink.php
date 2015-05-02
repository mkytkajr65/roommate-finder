<?php
	require_once '../core/alt_init.php';
	
	$db = DB::getInstance();

	$fb_link = Input::get("new_link");

	$user = new User();

	if (substr($fb_link, 0, 8) !== 'https://')
	{
		$fb_link =  "https://" . $fb_link;
	}



	if (preg_match("_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?\$_iuS", $fb_link)) {
	  $parsed = parse_url($fb_link);
	  if($parsed["host"] == "facebook.com" || $parsed["host"] == "www.facebook.com")
	  {
  		if($fb_link && $user->id)
		{
			$works = $db->update("user", $user->id, array(
					"facebook" => $fb_link
				));
			if($works)
			{
				exit();
			}
		}
	  }
	}
	echo "error";
?>