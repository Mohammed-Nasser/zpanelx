<?php

/**
 * Generic template place holder class.
 * @package zpanelx
 * @subpackage dryden -> ui -> tpl
 * @version 1.0.0
 * @author Bobby Allen (ballen@zpanelcp.com)
 * @copyright ZPanel Project (http://www.zpanelcp.com/)
 * @link http://www.zpanelcp.com/
 * @license GPL (http://www.gnu.org/licenses/gpl.html)
 * @Autocomplete module author d3c0y (http://forums.zpanelcp.com/member.php?10159-d3c0y)
 * @jQueryUI 1.8.1+ Required
 */
class ui_tpl_autocomplete {

    public static function Template() {
            $line = "";
        $modcats = ui_moduleloader::GetModuleCats();
            $line .= "<script type=\"text/javascript\">";
            $line .= "$(document).ready(function(){";
            $line .= "var modulefind =[";
        foreach ($modcats as $modcat) {
            $mods = ui_moduleloader::GetModuleList($modcat['mc_id_pk'], "modadmin");
            foreach ($mods as $mod) {
            $line .= "{ url: \"?module=" . $mod['mo_folder_vc'] . "\" ,";
            $line .= "label: \"" . ui_language::translate($mod['mo_name_vc']) . "\"},";
        }
        }
	     $line .= "];";
            $line .= "$(\"input#autocomplete\").autocomplete({";
	     $line .= "source: modulefind,";
	     $line .= "select: function( event, ui ) {";
	     $line .= "window.location.href = ui.item.url;";
	     $line .= "}";
	     $line .= "});";
	     $line .= "});";
            $line .= "</script>";
        return $line;
    }
}
?>
