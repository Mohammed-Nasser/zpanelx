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
 */
class ui_tpl_mainnav {

    public static function Template() {
        $line = "";
        $tabindex = 0;
        $modcats = ui_moduleloader::GetModuleCats();
        foreach ($modcats as $modcat) {
            $cleanname = $modcat['mc_name_vc'];
            if ($cleanname == "Account Information") {
                $cleanname = "<i class=\"icon-user\"></i> Account";
            }
            if ($cleanname == "Server Admin") {
                $cleanname = "<i class=\"icon-cogs\"></i> Admin";
            }
            if ($cleanname == "Database Management") {
                $cleanname = "<i class=\"icon-reorder\"></i> Database";
            }
            if ($cleanname == "Domain Management") {
                $cleanname = "<i class=\"icon-globe\"></i> Domain";
            }
            if ($cleanname == "File Management") {
                $cleanname = "<i class=\"icon-folder-open\"></i> File";
            }
            if ($cleanname == "Advanced") {
                $cleanname = "<i class=\"icon-wrench\"></i> Advanced";
            }
            if ($cleanname == "Mail") {
                $cleanname = "<i class=\"icon-envelope-alt\"></i> Mail";
            }
            if ($cleanname == "Reseller") {
                $cleanname = "<i class=\"icon-group\"></i> Reseller";
            }
            $cleanname = ui_language::translate($cleanname);
            $mods = ui_moduleloader::GetModuleList($modcat['mc_id_pk'], "modadmin");
            $line .= "<ul class=\"nav\">";
            $line .= "<li id=\"fat-menu\" class=\"dropdown usernav\">";
            $line .= "<a href=\"#" . str_replace(" ", "_", strtolower($modcat['mc_name_vc'])) . "_top\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
            $line .= "" . $cleanname . "";
            $line .= "</a>";
            $line .= "<ul id=\"topnav\" class=\"dropdown-menu\">";
            foreach ($mods as $mod) {
                $line .= "<li><a tabindex=\"-1\" href=\"?module=" . $mod['mo_folder_vc'] . "\">";
                $line .= "<img src=\"modules/" . $mod['mo_folder_vc'] . "/assets/icon.png\" width=\"20\" height=\"20\" border=\"0\" />";
                $line .= "&nbsp;" . ui_language::translate($mod['mo_name_vc']) . "";
                $line .= "</a></li>";
            }
                $line .= "</ul></li></ul>";
            $tabindex++;
        }
        return $line;
    }

}

?>
