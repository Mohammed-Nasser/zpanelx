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
class ui_tpl_mobilenav {

    public static function Template() {
        $line = "";
        $tabindex = 0;
        $modcats = ui_moduleloader::GetModuleCats();
        foreach ($modcats as $modcat) {
            $cleanname = $modcat['mc_name_vc'];
            if ($cleanname == "Account Information") {
                $cleanname = "<i class=\"icon-user\"></i>Account";
            }
            if ($cleanname == "Server Admin") {
                $cleanname = "<i class=\"icon-cogs\"></i>Admin";
            }
            if ($cleanname == "Database Management") {
                $cleanname = "<i class=\"icon-reorder\"></i>Database";
            }
            if ($cleanname == "Domain Management") {
                $cleanname = "<i class=\"icon-globe\"></i>Domain";
            }
            if ($cleanname == "File Management") {
                $cleanname = "<i class=\"icon-folder-open\"></i>File";
            }
            if ($cleanname == "Advanced") {
                $cleanname = "<i class=\"icon-wrench\"></i>Advanced";
            }
            if ($cleanname == "Mail") {
                $cleanname = "<i class=\"icon-envelope-alt\"></i>Mail";
            }
            if ($cleanname == "Reseller") {
                $cleanname = "<i class=\"icon-group\"></i>Reseller";
            }
            $cleanname = ui_language::translate($cleanname);
            $mods = ui_moduleloader::GetModuleList($modcat['mc_id_pk'], "modadmin");
            $line .= "<a href=\"#" . str_replace(" ", "_", strtolower($modcat['mc_name_vc'])) . "\"  class=\"nav-header\" data-toggle=\"collapse\">" . $cleanname . "</a>";
            $line .= "<ul id=\"" . str_replace(" ", "_", strtolower($modcat['mc_name_vc'])) . "\" class=\"nav nav-list collapse\">";
            foreach ($mods as $mod) {
                $line .= "<li>";
                $line .= "<a href=\"?module=" . $mod['mo_folder_vc'] . "\">";
                $line .= "<img src=\"modules/" . $mod['mo_folder_vc'] . "/assets/icon.png\" width=\"20\" height=\"20\" border=\"0\" /> ";
                $line .= "" . ui_language::translate($mod['mo_name_vc']) . "";
                $line .= "</a>";
                $line .= "</li>";
            }
                $line .= "</ul>";
            $tabindex++;
        }
        return $line;
    }

}

?>
