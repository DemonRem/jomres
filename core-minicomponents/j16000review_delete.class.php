<?php
/**
 * Core file
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 5
* @package Jomres
* @copyright	2005-2011 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j16000review_delete
	{
	function j16000review_delete()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$rating_id = (int)$_GET['rating_id'];

		if ($rating_id > 0)
			{
			jr_import('jomres_reviews');
			$Reviews = new jomres_reviews();
			$result=$Reviews->delete_review($rating_id);
			if ($result)
				{
				echo "1";
				return;
				}
			echo "0";
			return;
			}
		}


	function getRetVals()
		{
		return $this->retVals;
		}
	}