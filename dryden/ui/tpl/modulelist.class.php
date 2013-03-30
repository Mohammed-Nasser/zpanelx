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
class ui_tpl_modulelist {

    public static function Template() {
        global $controller;
        if (!$controller->GetControllerRequest('URL', 'module')) {
            $line = "<div class=\"container-fluid\">";
            $modcats = ui_moduleloader::GetModuleCats();
            foreach ($modcats as $modcat) {
                $mods = ui_moduleloader::GetModuleList($modcat['mc_id_pk'], "modadmin");
                if ($mods) {
                    $line .= "<div class=\"block\">";
                    $line .= "<div class=\"block-heading\">";
                    $line .= "<span class=\"block-icon pull-right\">";
                    $line .= "<a href=\"#" . str_replace(" ", "_", strtolower($modcat['mc_name_vc'])) . "_main\" data-toggle=\"collapse\" rel=\"tooltip\" title=\"Click to hide\">";   
                    $line .= "<i class=\"icon-sort\"></i>";
                    $line .= "</a></span>";
                    $line .= "" . ui_language::translate($modcat['mc_name_vc']) . "";                    
		      $line .= "</div></a>";
                    $line .= "<div class=\"block-body collapse in\" id=\"" . str_replace(" ", "_", strtolower($modcat['mc_name_vc'])) . "_main\">";
                    $icons_per_row = ctrl_options::GetSystemOption('module_icons_pr');
                    $num_icons = 0;
                    foreach ($mods as $mod) {
                        $translatename = ui_language::translate($mod['mo_name_vc']);
                        $cleanname = str_replace(" ", "<br />", $translatename);
                        if ($num_icons == $icons_per_row) {
                            $line .= "";
                            $num_icons = 0;
                        }
                        $line .= "<a href=\"?module=" . $mod['mo_folder_vc'] . "\">";
                        $line .= "<div class=\"linkicons\" title=\"" . ui_language::translate($mod['mo_desc_tx']) . "\">";
                        $line .= "<img src=\"modules/" . $mod['mo_folder_vc'] . "/assets/icon.png\"><br>";
                        $line .= "" . $cleanname . "";
                        $line .= "</div></a>";
                        $num_icons++;
                    }
                    $line .= "</div></div>";
                }
            }
            $line .= "</div>";
            return $line;
        }
    }

}

?>