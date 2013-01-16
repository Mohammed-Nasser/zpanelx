<?php

/**
 * A class to protect against LFI.
 * @package zpanelx
 * @subpackage dryden -> filesystem
 * @version 1.0.3
 * @author Bobby Allen (ballen@zpanelcp.com)
 * @copyright ZPanel Project (http://www.zpanelcp.com/)
 * @link http://www.zpanelcp.com/
 * @license GPL (http://www.gnu.org/licenses/gpl.html)
 */
class fs_protector {

    /**
     * Returns a safe file system string (to stop reverse iteration of the file system by removing full-stops and slashes (file system seperators etc. in theory, jailing them.)
     * @author Bobby Allen (ballen@zpanelcp.com) 
     * @param $foldername The single name of the folder.
     * @return string The sanitised module folder name. 
     */
    public static function SanitiseFolderName($foldername) {
        return str_replace(array('.', '/', '\\'), array('_', '_', '_'), $foldername);
    }

    /**
     * Checks module folder name from URL, checks with the database that a module is installed and therefore legit.
     * @author Bobby Allen (ballen@zpanelcp.com) 
     * @return string The sanitised module folder name. 
     */
    public static function ModuleRequest() {
        global $zdbh;
        if (isset($_GET['m'])) {
            $module_folder = self::SanitiseFolderName($_GET['m']);
        } elseif (isset($_GET['module'])) {
            $module_folder = self::SanitiseFolderName($_GET['module']);
        } else {
            $module_folder = null;
        }
        $sqlString = "SELECT mo_folder_vc FROM x_modules WHERE mo_folder_vc = :name";
        $bindArray = array(':name' => $module_folder);
        $zdbh->bindQuery($sqlString, $bindArray);
        $result = $zdbh->returnRow();
        if ($result) {
            return $result['mo_folder_vc'];
        } else {
            return false;
        }
    }

}

?>
