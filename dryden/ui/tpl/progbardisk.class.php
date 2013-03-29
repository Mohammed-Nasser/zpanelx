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
class ui_tpl_progbardisk {

    public static function Template() {
        global $controller;
        $currentuser = ctrl_users::GetUserDetail();
        $diskquota = $currentuser['diskquota'];
        $diskspace = ctrl_users::GetQuotaUsages('diskspace', $currentuser['userid']);
        if ($diskquota == 0) {
<<<<<<< HEAD
<<<<<<< HEAD
            return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=0"/>';
        } else {
            if (fs_director::CheckForEmptyValue($diskspace))
                $diskspace = 0;
            $percent = round(($diskspace / $diskquota) * 100, 0);
            return "<img src=\"etc/lib/pChart2/zpanel/zProgress.php?percent=" . $percent . "\"/>";
=======
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
            $line = '[Illimited]'; // no quota, it is desactivated, 
            //to do : dislay a same size image for "Illimited" ?
        }
        else {
            if (fs_director::CheckForEmptyValue($diskspace)) 
			    $diskspace = 0;
              
            $percent = round(($diskspace / $diskquota) * 100, 0);
            return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=' . $percent . '"/>';
<<<<<<< HEAD
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
        }
    }

}

?>
