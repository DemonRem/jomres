<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.8.16
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j11040towns
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		$this->ret_vals=array();
		
		$resource_type   = jomresGetParam( $_REQUEST, 'resource_type', '' );
		$resource_id   = jomresGetParam( $_REQUEST, 'resource_id', '0' );

		$files = scandir_getfiles(JOMRES_IMAGELOCATION_ABSPATH . $resource_type . JRDS . $resource_id . JRDS);
		
		if (!empty($files))
			{
			foreach ($files as $file)
				{
				$large = JOMRES_IMAGELOCATION_RELPATH . $resource_type . "/" . $resource_id . "/" . $file;
				$medium = JOMRES_IMAGELOCATION_RELPATH . $resource_type . "/" . $resource_id . "/" . $file;
				$thumbnail = JOMRES_IMAGELOCATION_RELPATH . $resource_type . "/" . $resource_id . "/" . $file;
				if ( file_exists (JOMRES_IMAGELOCATION_ABSPATH . $resource_type . JRDS . $resource_id . JRDS . 'medium' . JRDS . $file ) )
					{
					$medium = JOMRES_IMAGELOCATION_RELPATH .  $resource_type ."/".$resource_id."/medium/" . $file;
					}
				if ( file_exists (JOMRES_IMAGELOCATION_ABSPATH . $resource_type . JRDS . $resource_id . JRDS . 'thumbnail' . JRDS . $file ) )
					{
					$thumbnail = JOMRES_IMAGELOCATION_RELPATH .  $resource_type ."/".$resource_id."/thumbnail/" . $file;
					}

				$this->ret_vals[] = array (
					'large' => $large,
					'medium' => $medium,
					'small' => $thumbnail
					);
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
