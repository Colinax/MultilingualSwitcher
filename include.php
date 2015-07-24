<?php
/**
 * Code snippet: Language Switcher
 *
 * This code snippets displays language flags which can be used to
 * switch the current displayed page to another language.
 *
 * Pls read following instruction to get language switcher working:
 *
 * it is required to activate the language page settings
 * by adding a page, set the page setting to the correct language
 *
 *
 *
 *
 * This file contains the language switcher function.
 *
 * LICENSE: GNU General Public License 3.0
 *
 * @author		Dietmar W�llbrink
 * @copyright	Dietmar W�llbrink (c) 2009 - 2011
 * @license		http://www.gnu.org/licenses/gpl.html
 * @version		0.1.0
 * @platform	Website Baker 2.8.x
 *
*/

// prevent this file from being accessed directly
if (!defined('WB_PATH')) { die( header('Location: ../../index.php')); }


if(!function_exists('language_menu'))
{
    function language_menu($ext='gif')
    {
	    global $database;
		$mod_path = str_replace('\\', '/', dirname(__FILE__));
		$mod_rel = str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\', '/', $mod_path ));
		$mod_name = basename($mod_path);
		include('lang.functions.php');
	    // Work-out we should check for existing page_code
        $field_set = $database->field_exists(TABLE_PREFIX.'pages', 'page_code');
	    if (defined('PAGE_LANGUAGES') && (PAGE_LANGUAGES==true) && ($field_set==true))
	    {
			include(get_module_language_file($mod_name));
			$langIcons  = array();
			print '<div id="langmenu">'.PHP_EOL;
			$langIcons = set_language_icon(PAGE_ID,$ext );

            if( sizeof($langIcons) > 1 )
            {
				foreach( $langIcons as $key=>$value )
				{
					print $value;
				}
			}
		}
		print '</div>'.PHP_EOL;
	    return true;
    }
    return false;
}
//
