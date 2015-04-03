<?php
	class PageChecker
	{
		public function isPage($page = null)
		{
			if($page)
			{
				if($page == str_replace("/", "", $_SERVER['PHP_SELF']))
				{
					return true;
				}
			}
			return false;
		}
	}
?>