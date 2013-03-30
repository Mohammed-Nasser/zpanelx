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
class ui_tpl_clientdomains {

    public static function Template() {
        global $zdbh;
        $currentuser = ctrl_users::GetUserDetail();
        $line = "";

        $numrows = $zdbh->prepare("SELECT * FROM x_vhosts WHERE vh_acc_fk= :userid AND vh_type_in=1 AND vh_deleted_ts IS NULL ORDER BY vh_id_pk LIMIT 4");
        $numrows->bindParam(':userid', $currentuser['userid']);
        $numrows->execute();

        if ($numrows->fetchColumn() <> 0) {
            $sql = $zdbh->prepare("SELECT * FROM x_vhosts WHERE vh_acc_fk= :userid AND vh_type_in=1 AND vh_deleted_ts IS NULL ORDER BY vh_id_pk LIMIT 4");
            $sql->bindParam(':userid', $currentuser['userid']);
            $sql->execute();
            $limit = 0;
            $line .= "<div class=\"d_container\"><div class=\"d_content\"><div class=\"d_title\">Domains</div>";
            while ($rowdomains = $sql->fetch()) {
                if ($rowdomains['vh_type_in'] == 1) {
                    $line .= "<tr>";
                    $line .= "<div class=\"d_domain\"><a href=\"http://" . $rowdomains['vh_name_vc'] . "\" target=\"_blank\">" . $rowdomains['vh_name_vc'] . "</a></div>";
                    $line .= "<div class=\"d_status\">";

                    if ($rowdomains['vh_active_in'] == 1 && $rowdomains['vh_enabled_in'] == 1) {
                        $line .= "<a href=\"#\" title=\"Live\"><img src=\"etc/styles/zpanelx/img/live.png\"></a></div>";
                    } elseif ($rowdomains['vh_active_in'] == 0 && $rowdomains['vh_enabled_in'] == 1) {
                        $line .= "<a href=\"#\" title=\"Pending\"><img src=\"etc/styles/zpanelx/img/pending.png\"></a></div>";
                    } else {
                        $line .= "";
                    }
                    if ($rowdomains['vh_enabled_in'] == 0) {
                        $line .= "<a href=\"#\" title=\"Disabled\"><img src=\"etc/styles/zpanelx/img/disabled.png\"></a></div> ";
                    }
                }
                $limit++;
            }
            if ($limit >= 4) {
                $line .= "<div class=\"d_domain\">&nbsp;&nbsp;&nbsp;<a href=\"?module=domains\">(Show All)</a></div>";
            }
                $line .= "</div></div>";
        } else {
            $line .= "<div class=\"d_container\"><div class=\"d_content\"><div class=\"d_title\">Domains</strong></div>";
            $line .= "<div class=\"d_domain\">None</div><div class=\"d_status\"><a href=\"?module=domains\">CREATE</a></div></div></div>";
        }

        $sql = "SELECT * FROM x_vhosts WHERE vh_acc_fk= :userid AND vh_type_in=2 AND vh_deleted_ts IS NULL ORDER BY vh_id_pk LIMIT 4";

        $numrows = $zdbh->prepare($sql);
        $numrows->bindParam(':userid', $currentuser['userid']);
        $numrows->execute();

        if ($numrows->fetchColumn() <> 0) {
            $sql = $zdbh->prepare($sql);
            $sql->bindParam(':userid', $currentuser['userid']);
            $sql->execute();
            $limit = 0;
            $line .= "<div class=\"d_container\"><div class=\"d_content\"><div class=\"d_title\">Sub Domains</div>";
            while ($rowdomains = $sql->fetch()) {
                if ($rowdomains['vh_type_in'] == 2) {
                    $line .= "<tr>";
                    $line .= "<div class=\"d_domain\"><a href=\"http://" . $rowdomains['vh_name_vc'] . "\" target=\"_blank\">" . $rowdomains['vh_name_vc'] . "</a></div>";
                    $line .= "<div class=\"d_status\">";

                    if ($rowdomains['vh_active_in'] == 1 && $rowdomains['vh_enabled_in'] == 1) {
                        $line .= "<a href=\"#\" title=\"Live\"><img src=\"etc/styles/zpanelx/img/live.png\"></a></div>";
                    } elseif ($rowdomains['vh_active_in'] == 0 && $rowdomains['vh_enabled_in'] == 1) {
                        $line .= "<a href=\"#\" title=\"Pending\"><img src=\"etc/styles/zpanelx/img/pending.png\"></a></div>";
                    } else {
                        $line .= "";
                    }
                    if ($rowdomains['vh_enabled_in'] == 0) {
                        $line .= "<a href=\"#\" title=\"Disabled\"><img src=\"etc/styles/zpanelx/img/disabled.png\"></a></div>";
                    }
                }
                $limit++;
            }
            if ($limit >= 4) {
                $line .= "<div class=\"d_domain\">&nbsp;&nbsp;&nbsp;<a href=\"?module=sub_domains\">(Show All)</a></div>";
            }
                $line .= "</div></div>";
        } else {
            $line .= "<div class=\"d_container\"><div class=\"d_content\"><div class=\"d_title\">Sub Domains</strong></div>";
            $line .= "<div class=\"d_domain\">None</div><div class=\"d_status\"><a href=\"?module=sub_domains\">CREATE</a></div></div></div>";
        }

        $sql = "SELECT * FROM x_vhosts WHERE vh_acc_fk= :userid AND vh_type_in=3 AND vh_deleted_ts IS NULL ORDER BY vh_id_pk LIMIT 4";

        $numrows = $zdbh->prepare($sql);
        $numrows->bindParam(':userid', $currentuser['userid']);
        $numrows->execute();

        if ($numrows->fetchColumn() <> 0) {
            $sql = $zdbh->prepare($sql);
            $sql->bindParam(':userid', $currentuser['userid']);
            $sql->execute();
            $limit = 0;
            $line .= "<div class=\"d_container_last\"><div class=\"d_content_last\"><div class=\"d_title\">Parked Domains</div>";
            while ($rowdomains = $sql->fetch()) {
                if ($rowdomains['vh_type_in'] == 3) {
                    $line .= "<div class=\"d_domain\"><a href=\"http://" . $rowdomains['vh_name_vc'] . "\" target=\"_blank\">" . $rowdomains['vh_name_vc'] . "</a></div>";
                    $line .= "<div class=\"d_status\">";

                    if ($rowdomains['vh_active_in'] == 1 && $rowdomains['vh_enabled_in'] == 1) {
                        $line .= "<a href=\"#\" title=\"Live\"><img src=\"etc/styles/zpanelx/img/live.png\"></a></div>";
                    } elseif ($rowdomains['vh_active_in'] == 0 && $rowdomains['vh_enabled_in'] == 1) {
                        $line .= "<a href=\"#\" title=\"Pending\"><img src=\"etc/styles/zpanelx/img/pending.png\"></a></div>";
                    } else {
                        $line .= "";
                    }
                    if ($rowdomains['vh_enabled_in'] == 0) {
                        $line .= "<a href=\"#\" title=\"Disabled\"><img src=\"etc/styles/zpanelx/img/disabled.png\"></a></div>";
                    }
                }
                $limit++;
            }
            if ($limit >= 4) {
                $line .= "<div class=\"d_domain\">&nbsp;&nbsp;&nbsp;<a href=\"?module=parked_domains\">(Show All)</a></div>";
            }
                $line .= "</div></div>";
        } else {
            $line .= "<div class=\"d_container_last\"><div class=\"d_content_last\"><div class=\"d_title\">Parked Domains</strong></div>";
            $line .= "<div class=\"d_domain\">None</div><div class=\"d_status\"><a href=\"?module=parked_domains\">CREATE</a></div></div></div>";
        }

        $line .= "</div>";

        return $line;
    }

}

?>