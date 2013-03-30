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
class ui_tpl_notice {

    public static function Template() {
        global $controller;
        if (!$controller->GetControllerRequest('URL', 'module')) {
        $user_array = ctrl_users::GetUserDetail();
        global $zdbh;
        $result = $zdbh->query("SELECT ac_notice_tx FROM x_accounts WHERE ac_id_pk = " . $user_array['resellerid'] . "")->Fetch();
        if ($result) {
            if ($result['ac_notice_tx'] <> "")
                return "<div class=\"clearfix\"></div><div id=\"client_notice\" class=\"client-notice alert alert-info fade in\" data-alert=\"alert\"><button type=\"button\" id=\"notice-close\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . runtime_xss::xssClean($result['ac_notice_tx']) . "</div>";
            return false;
        } else {
            return false;
        }
    }

}
}
?>
