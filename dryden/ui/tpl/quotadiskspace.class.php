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
class ui_tpl_quotadiskspace {

    public static function Template() {
        $currentuser = ctrl_users::GetUserDetail();
        if ($currentuser['diskquota'] == 0)
<<<<<<< HEAD
<<<<<<< HEAD
            $diskspacequota = ui_language::translate('Unlimited');
        else
            $diskspacequota = fs_director::ShowHumanFileSize($currentuser['diskquota']);
=======
          $diskspacequota = ui_language::translate('Illimited');
        else
          $diskspacequota = fs_director::ShowHumanFileSize($currentuser['diskquota']);
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
=======
          $diskspacequota = ui_language::translate('Illimited');
        else
          $diskspacequota = fs_director::ShowHumanFileSize($currentuser['diskquota']);
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
        return $diskspacequota;
    }

}

?>
