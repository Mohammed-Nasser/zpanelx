<?php

/**
 *
 * ZPanel - A Cross-Platform Open-Source Web Hosting Control panel.
 * 
 * @package ZPanel
 * @version $Id$
 * @author Bobby Allen - ballen@zpanelcp.com
 * @copyright (c) 2008-2011 ZPanel Group - http://www.zpanelcp.com/
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License v3
 *
 * This program (ZPanel) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
class module_controller {

    static $diskquota;
    static $diskspace;
    static $bandwidth;
    static $bandwidthquota;
    static $domains;
    static $domainsquota;
    static $subdomains;
    static $subdomainsquota;
    static $parkeddomains;
    static $parkeddomainsquota;
    static $mysql;
    static $mysqlquota;
    static $ftpaccounts;
    static $ftpaccountsquota;
    static $mailboxes;
    static $mailboxquota;
    static $forwarders;
    static $forwardersquota;
    static $distlists;
    static $distrobutionlistsquota;

<<<<<<< HEAD
<<<<<<< HEAD
    static function getUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getDomainsUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayDomainsUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getSubDomainsUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplaySubDomainsUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getParkedDomainsUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayParkedDomainsUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getMysqlUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayMysqlUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getFTPUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayFTPUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getMailboxUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayMailboxUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getForwardersUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayForwardersUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
    }

    static function getDistListUsage() {
        if (file_exists('etc/lib/pChart2/class/pData.class.php')) {
            $display = self::DisplayDistListUsagepChart();
        } else {
            $display = "pChart Library Not Found.";
        }
        return $display;
=======
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
    private function check_pChart($display) {
        return (file_exists('etc/lib/pChart2/class/pData.class.php')) ? $display : 'pChart Library Not Found.';
    }
    
    static function getUsage() {
//        return (file_exists('etc/lib/pChart2/class/pData.class.php')) ? self::DisplayUsagepChart() : 'pChart Library Not Found.';
        return self::check_pChart(self::DisplayUsagepChart());
    }

    static function getDomainsUsage() {
        return self::check_pChart(self::DisplayDomainsUsagepChart());
    }

    static function getSubDomainsUsage() {
        return self::check_pChart(self::DisplaySubDomainsUsagepChart());
    }

    static function getParkedDomainsUsage() {
        return self::check_pChart(self::DisplayParkedDomainsUsagepChart());
    }

    static function getMysqlUsage() {
        return self::check_pChart(self::DisplayMysqlUsagepChart());
    }

    static function getFTPUsage() {
        return self::check_pChart(self::DisplayFTPUsagepChart());
    }

    static function getMailboxUsage() {
        return self::check_pChart(self::DisplayMailboxUsagepChart());
    }

    static function getForwardersUsage() {
        return self::check_pChart(self::DisplayForwardersUsagepChart());
    }

    static function getDistListUsage() {
        return self::check_pChart(self::DisplayDistListUsagepChart());
<<<<<<< HEAD
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
    }

    #Begin Display Methods

    static function DisplayUsagepChart() {
        global $zdbh;
        global $controller;
        $currentuser = ctrl_users::GetUserDetail();
<<<<<<< HEAD
<<<<<<< HEAD

        self::$diskquota = $currentuser['diskquota'];
        self::$diskspace = ctrl_users::GetQuotaUsages('diskspace', $currentuser['userid']);
        if (empty($currentuser['bandwidthquota'])) {
            self::$bandwidthquota = 0;
        } else {
            self::$bandwidthquota = $currentuser['bandwidthquota'];
        }
        self::$bandwidth = ctrl_users::GetQuotaUsages('bandwidth', $currentuser['userid']);
        if (empty($currentuser['domainquota'])) {
            self::$domainsquota = 0;
        } else {
            self::$domainsquota = $currentuser['domainquota'];
        }
        self::$domains = ctrl_users::GetQuotaUsages('domains', $currentuser['userid']);
        if (empty($currentuser['subdomainquota'])) {
            self::$subdomainsquota = 0;
        } else {
            self::$subdomainsquota = $currentuser['subdomainquota'];
        }
        self::$subdomains = ctrl_users::GetQuotaUsages('subdomains', $currentuser['userid']);
        if (empty($currentuser['parkeddomainquota'])) {
            self::$parkeddomainsquota = 0;
        } else {
            self::$parkeddomainsquota = $currentuser['parkeddomainquota'];
        }
        self::$parkeddomains = ctrl_users::GetQuotaUsages('parkeddomains', $currentuser['userid']);
        if (empty($currentuser['mysqlquota'])) {
            self::$mysqlquota = 0;
        } else {
            self::$mysqlquota = $currentuser['mysqlquota'];
        }
        self::$mysql = ctrl_users::GetQuotaUsages('mysql', $currentuser['userid']);
        if (empty($currentuser['ftpaccountsquota'])) {
            self::$ftpaccountsquota = 0;
        } else {
            self::$ftpaccountsquota = $currentuser['ftpaccountsquota'];
        }
        self::$ftpaccounts = ctrl_users::GetQuotaUsages('ftpaccounts', $currentuser['userid']);
        if (empty($currentuser['mailboxquota'])) {
            self::$mailboxquota = 0;
        } else {
            self::$mailboxquota = $currentuser['mailboxquota'];
        }
        self::$mailboxes = ctrl_users::GetQuotaUsages('mailboxes', $currentuser['userid']);
        if (empty($currentuser['forwardersquota'])) {
            self::$forwardersquota = 0;
        } else {
            self::$forwardersquota = $currentuser['forwardersquota'];
        }
        self::$forwarders = ctrl_users::GetQuotaUsages('forwarders', $currentuser['userid']);
        if (empty($currentuser['distrobutionlistsquota'])) {
            self::$distrobutionlistsquota = 0;
        } else {
            self::$distrobutionlistsquota = $currentuser['distrobutionlistsquota'];
        }
        self::$distlists = ctrl_users::GetQuotaUsages('distlists', $currentuser['userid']);

        $total = self::$diskquota;
        $used = self::$diskspace;
        $free = $total - $used;
        if ($free < 0) {
            $free = 0;
        }

        $line .= "<h2>" . ui_language::translate("Package Usage Total") . "</h2>";
        $line .= "<table class=\"table\">";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Disk space") . ":</td>";
        $line .= "<td nowrap=\"nowrap\">" . fs_director::ShowHumanFileSize(self::$diskspace) . " / " . fs_director::ShowHumanFileSize(self::$diskquota) . "</td><td>" . self::DisplaypBar("diskspace", "diskquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Bandwidth") . ":</td>";
        $line .= "<td>" . fs_director::ShowHumanFileSize(self::$bandwidth) . " / " . fs_director::ShowHumanFileSize(self::$bandwidthquota) . "</td><td>" . self::DisplaypBar("bandwidth", "bandwidthquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Domains") . ":</td>";
        $line .= "<td>" . self::$domains . " / " . self::$domainsquota . "</td><td>" . self::DisplaypBar("domains", "domainquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Sub-domains") . ":</td>";
        $line .= "<td>" . self::$subdomains . " / " . self::$subdomainsquota . "</td><td>" . self::DisplaypBar("subdomains", "subdomainquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Parked domains") . ":</td>";
        $line .= "<td>" . self::$parkeddomains . " / " . self::$parkeddomainsquota . "</td><td>" . self::DisplaypBar("parkeddomains", "parkeddomainquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("FTP accounts") . ":</td>";
        $line .= "<td>" . self::$ftpaccounts . " / " . self::$ftpaccountsquota . "</td><td>" . self::DisplaypBar("ftpaccounts", "ftpaccountsquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("MySQL&reg databases") . ":</td>";
        $line .= "<td>" . self::$mysql . " / " . self::$mysqlquota . "</td><td>" . self::DisplaypBar("mysql", "mysqlquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Mailboxes") . ":</td>";
        $line .= "<td>" . self::$mailboxes . " / " . self::$mailboxquota . "</td><td>" . self::DisplaypBar("mailboxes", "mailboxquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Mail forwarders") . ":</td>";
        $line .= "<td>" . self::$forwarders . " / " . self::$forwardersquota . "</td><td>" . self::DisplaypBar("forwarders", "forwardersquota") . "</td>";
        $line .= "</tr>";
        $line .= "<tr>";
        $line .= "<td>" . ui_language::translate("Distribution lists") . ":</td>";
        $line .= "<td>" . self::$distlists . " / " . self::$distrobutionlistsquota . "</td><td>" . self::DisplaypBar("distlists", "distrobutionlistsquota") . "</td>";
        $line .= "</tr>";
        $line .= "</table>";
        $line .= "<div class=\"row-fluid text-center\">";
        $line .= "<h2>" . ui_language::translate("Disk Usage Total") . "</h2>";
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free_Space: " . fs_director::ShowHumanFileSize($free) . "::Used_Space: " . fs_director::ShowHumanFileSize($used) . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        $line .= "</div>";
        return $line;
    }

    static function DisplayDomainsUsagepChart() {
        $line = "<h2>" . ui_language::translate("Domain Usage") . "</h2>";
        $total = self::$domainsquota;
        $used = self::$domains;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplaySubDomainsUsagepChart() {
        $line = "<h2>" . ui_language::translate("Sub-Domain Usage") . "</h2>";
        $total = self::$subdomainsquota;
        $used = self::$subdomains;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplayParkedDomainsUsagepChart() {
        $line = "<h2>" . ui_language::translate("Parked-Domain Usage") . "</h2>";
        $total = self::$parkeddomainsquota;
        $used = self::$parkeddomains;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplayMysqlUsagepChart() {
        $line = "<h2>" . ui_language::translate("MySQL&reg Database Usage") . "</h2>";
        $total = self::$mysqlquota;
        $used = self::$mysql;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplayMailboxUsagepChart() {
        $line = "<h2>" . ui_language::translate("Mailbox Usage") . "</h2>";
        $total = self::$mailboxquota;
        $used = self::$mailboxes;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplayFTPUsagepChart() {
        $line = "<h2>" . ui_language::translate("FTP Usage") . "</h2>";
        $total = self::$ftpaccountsquota;
        $used = self::$ftpaccounts;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplayForwardersUsagepChart() {
        $line = "<h2>" . ui_language::translate("Forwarders Usage") . "</h2>";
        $total = self::$forwardersquota;
        $used = self::$forwarders;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
    }

    static function DisplayDistListUsagepChart() {
        $line = "<h2>" . ui_language::translate("Distribution List Usage") . "</h2>";
        $total = self::$distrobutionlistsquota;
        $used = self::$distlists;
        $free = $total - $used;
        $line .= "<img src=\"etc/lib/pChart2/zpanel/z3DPie.php?score=" . $free . "::" . $used . "&labels=Free: " . $free . "::Used: " . $used . "&legendfont=verdana&legendfontsize=8&imagesize=240::190&chartsize=120::90&radius=100&legendsize=10::160\"/>";
        return $line;
=======
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
        
        function empty_as_0($value) {
          return (empty($value)) ? 0 : $value ;
        }
        self::$diskquota = $currentuser['diskquota'];
        self::$diskspace = ctrl_users::GetQuotaUsages('diskspace', $currentuser['userid']);
        
        self::$bandwidthquota = empty_as_0($currentuser['bandwidthquota']);
        self::$bandwidth = ctrl_users::GetQuotaUsages('bandwidth', $currentuser['userid']);
        
        self::$domainsquota = empty_as_0($currentuser['domainquota']);
        self::$domains = ctrl_users::GetQuotaUsages('domains', $currentuser['userid']);
        
        self::$subdomainsquota = empty_as_0($currentuser['subdomainquota']);
        self::$subdomains = ctrl_users::GetQuotaUsages('subdomains', $currentuser['userid']);
        
        self::$parkeddomainsquota = empty_as_0($currentuser['parkeddomainquota']);
        self::$parkeddomains = ctrl_users::GetQuotaUsages('parkeddomains', $currentuser['userid']);
        
        self::$mysqlquota = empty_as_0($currentuser['mysqlquota']);
        self::$mysql = ctrl_users::GetQuotaUsages('mysql', $currentuser['userid']);

        self::$ftpaccountsquota = empty_as_0($currentuser['ftpaccountsquota']);
        self::$ftpaccounts = ctrl_users::GetQuotaUsages('ftpaccounts', $currentuser['userid']);
        
        self::$mailboxquota = empty_as_0($currentuser['mailboxquota']);
        self::$mailboxes = ctrl_users::GetQuotaUsages('mailboxes', $currentuser['userid']);
        
        self::$forwardersquota = empty_as_0($currentuser['forwardersquota']);
        self::$forwarders = ctrl_users::GetQuotaUsages('forwarders', $currentuser['userid']);

<<<<<<< HEAD
<<<<<<< HEAD
        self::$distrobutionlistsquota = $currentuser['distrobutionlistsquota'];
=======
        self::$distlistsquota = $currentuser['distlistsquota'];
>>>>>>> a3e8ac4... Fixed a few issues from the last commit, also removed the HTML output of used domains when the quota is 'unlimited' as in my opinion there is no need to output  graph/used as the pie graphs are there to give a graphical representation of used/avaliable. As the numeric values of the used and avaliable are printed at the top of the Usage module anyways, I thought it looked cleaner to remove the orphaned HTML. I also fixed up some issues with HTML errors in Usage Viewer module. - Added new Unlimited image too!
=======
        self::$distlistsquota = $currentuser['distlistsquota'];
>>>>>>> a3e8ac4... Fixed a few issues from the last commit, also removed the HTML output of used domains when the quota is 'unlimited' as in my opinion there is no need to output  graph/used as the pie graphs are there to give a graphical representation of used/avaliable. As the numeric values of the used and avaliable are printed at the top of the Usage module anyways, I thought it looked cleaner to remove the orphaned HTML. I also fixed up some issues with HTML errors in Usage Viewer module. - Added new Unlimited image too!
        self::$distlists = empty_as_0(ctrl_users::GetQuotaUsages('distlists', $currentuser['userid']));

        $total = self::$diskquota;
        $used = self::$diskspace;
        if ($total == 0) 
        {
            $free = 100000000;
            $freeLabel = ui_language::translate('Illimited');
        } else {   
            $free = $total - $used;
            if ($free < 0) {
              $free = 0;
            }
            $freeLabel = fs_director::ShowHumanFileSize($free);
        }
        $usedLabel = fs_director::ShowHumanFileSize($used);
<<<<<<< HEAD
<<<<<<< HEAD
       
        function pbar($used, $quota) {
          if ($quota == 0) 
            return '[' . ui_language::translate('Illimited') . ']'; //Quota are disabled
          if ($used == $quota) 
            return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=100"/>';
          return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=' . round($used/$quota*100, 0) . '"/>';
        }
        
        function build_row_usage($name, $used, $quota, $human = false) {
          return ($quota == 0 )
            ? '<tr>' .
                '<th nowrap="nowrap">' . ui_language::translate($name) . ':</th>' .
                '<td nowrap="nowrap">' . (($human) ? fs_director::ShowHumanFileSize($used) : $used). '</td>' .
                '<td> (' . ui_language::translate('Illimited') . ')</td>' .
              '</tr>'
            : '<tr>' .
                '<th nowrap="nowrap">' . ui_language::translate($name) . ':</th>' .
                '<td nowrap="nowrap">' . (($human) ? fs_director::ShowHumanFileSize($used) : $used) . ' / ' . (($human) ? fs_director::ShowHumanFileSize($quota) : $quota) . '</td>' .
                '<td>' . pBar($used, $quota) . '</td>' .
              '</tr>';
=======


        function build_row_usage($name, $used, $quota, $human = false) {
=======


        function build_row_usage($name, $used, $quota, $human = false) {
>>>>>>> a3e8ac4... Fixed a few issues from the last commit, also removed the HTML output of used domains when the quota is 'unlimited' as in my opinion there is no need to output  graph/used as the pie graphs are there to give a graphical representation of used/avaliable. As the numeric values of the used and avaliable are printed at the top of the Usage module anyways, I thought it looked cleaner to remove the orphaned HTML. I also fixed up some issues with HTML errors in Usage Viewer module. - Added new Unlimited image too!
            $res = '<tr><th nowrap="nowrap">' . ui_language::translate($name) . ':</th><td nowrap="nowrap">' . (($human) ? fs_director::ShowHumanFileSize($used) : $used);
            if ($quota < 0) {
                $res .= '</td><td style="text-align:center">&#8734; ' . ui_language::translate('Unlimited') . ' &#8734;</td>';
            } else {
                $res .= ' / ' . (($human) ? fs_director::ShowHumanFileSize($quota) : $quota) . '</td><td><img src="etc/lib/pChart2/zpanel/zProgress.php?percent=' . (($quota == 0 or $used == $quota) ? 100 : round($used / $quota * 100, 0)) . '"/>';
            }
            return $res . '</td></tr>';
>>>>>>> a3e8ac4... Fixed a few issues from the last commit, also removed the HTML output of used domains when the quota is 'unlimited' as in my opinion there is no need to output  graph/used as the pie graphs are there to give a graphical representation of used/avaliable. As the numeric values of the used and avaliable are printed at the top of the Usage module anyways, I thought it looked cleaner to remove the orphaned HTML. I also fixed up some issues with HTML errors in Usage Viewer module. - Added new Unlimited image too!
        }

<<<<<<< HEAD
        $line  = 
'<table class="none" cellpadding="0" cellspacing="0">'.
  '<tr>' .
    '<td align="left" valign="top" width="350px">' .
        '<h2>' . ui_language::translate('Disk Usage Total') . '</h2>' .
     // '<img src="etc/lib/pChart2/zpanel/z3DPie.php?score=40::30::20&amp;labels=test_1::test_2::test_3"/></td>'.

        '<img src="etc/lib/pChart2/zpanel/z3DPie.php?score=' . $free . '::' . $used .
             '&amp;imagesize=350::250&amp;chartsize=150::120&amp;radius=150' .
             '&amp;labels=Free_Space: ' . $freeLabel . '::Used_Space: ' . $usedLabel .
             '&amp;legendfont=verdana&amp;legendfontsize=8&amp;legendsize=10::220"/>' .
    '</td>' .
    '<td align="left" valign="top">'.
      '<h2>' . ui_language::translate('Package Usage Total') . '</h2>' .
      '<table class="zgrid" border="0" cellspacing="0" cellpadding="0">' .
        build_row_usage('Disk space', self::$diskspace, self::$diskquota, true) .
        build_row_usage('Bandwidth', self::$bandwidth, self::$bandwidthquota, true) .
        build_row_usage('Domains', self::$domains, self::$domainsquota) .
        build_row_usage('Sub-domains', self::$subdomains, self::$subdomainsquota) .
        build_row_usage('Parked domains', self::$parkeddomains, self::$parkeddomainsquota) .
        build_row_usage('FTP accounts', self::$ftpaccounts, self::$ftpaccountsquota) .
        build_row_usage('MySQL&reg databases', self::$mysql, self::$mysqlquota) .
        build_row_usage('Mailboxes', self::$mailboxes, self::$mailboxquota) .
        build_row_usage('Mail forwarders', self::$forwarders, self::$forwardersquota) .
        build_row_usage('Distribution lists', self::$distlists, self::$distrobutionlistsquota) .
      '</table>' .
    '</td>' .
  '</tr>' .
'</table>';
//$line  = "<img src=\"etc/lib/pChart2/charts/z3DPie.php?used=alot\"/>";
       return $line;
=======
    private function DisplayChart($name, $used, $maximum) {
        if ($maximum < 0) { //-1 = unlimited
            $res = '<img src="' . ui_tpl_assetfolderpath::Template() . 'images/unlimited.png" alt="' . ui_language::translate('Unlimited') . '"/>';
        } else {
            $free = max($maximum - $used, 0);
            $res = '<img src="etc/lib/pChart2/zpanel/z3DPie.php?score=' . $free . '::' . $used
                    . '&amp;imagesize=240::190&amp;chartsize=120::90&amp;radius=100'
                    . '&amp;labels=Free: ' . $free . '::Used: ' . $used
                    . '&amp;legendfont=verdana&amp;legendfontsize=8&amp;legendsize=10::160"'
                    . ' alt="' . ui_language::translate('Pie chart') . '"/>';
        }
        return '<h2>' . ui_language::translate($name) . '</h2>' . $res;
>>>>>>> a3e8ac4... Fixed a few issues from the last commit, also removed the HTML output of used domains when the quota is 'unlimited' as in my opinion there is no need to output  graph/used as the pie graphs are there to give a graphical representation of used/avaliable. As the numeric values of the used and avaliable are printed at the top of the Usage module anyways, I thought it looked cleaner to remove the orphaned HTML. I also fixed up some issues with HTML errors in Usage Viewer module. - Added new Unlimited image too!
    }

    private function DisplayChart($name, $used, $total) {
        $free = $total - $used;
        return '<h2>' . ui_language::translate($name) . '</h2>' .
               '<img src="etc/lib/pChart2/zpanel/z3DPie.php?score=' . $free . '::' . $used .
               '&amp;imagesize=240::190&amp;chartsize=120::90&amp;radius=100' .
               '&amp;labels=Free: ' . $free . '::Used: ' . $used .
               '&amp;legendfont=verdana&amp;legendfontsize=8&amp;legendsize=10::160"/>';
    }
    
    static function DisplayDomainsUsagepChart() { 
      return self::DisplayChart('Domain Usage', self::$domains, self::$domainsquota);
    }

    static function DisplaySubDomainsUsagepChart() {
      return self::DisplayChart('Sub-Domain Usage', self::$subdomains, self::$subdomainsquota);
    }

    static function DisplayParkedDomainsUsagepChart() {
      return self::DisplayChart('Parked-Domain Usage', self::$parkeddomains, self::$parkeddomainsquota);
    }

    static function DisplayMysqlUsagepChart() {
      return self::DisplayChart('MySQL&reg Database Usage', self::$mysql, self::$mysqlquota);
    }

    static function DisplayMailboxUsagepChart() {
      return self::DisplayChart('Mailbox Usage', self::$mailboxes, self::$mailboxquota);
    }

    static function DisplayFTPUsagepChart() {
      return self::DisplayChart('FTP Usage', self::$ftpaccounts, self::$ftpaccountsquota);
    }

    static function DisplayForwardersUsagepChart() {
      return self::DisplayChart('Forwarders Usage', self::$forwarders, self::$forwardersquota);
    }

    static function DisplayDistListUsagepChart() {
      return self::DisplayChart('Distribution List Usage', self::$distlists, self::$distrobutionlistsquota);
<<<<<<< HEAD
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
    }

    static function DisplaypBar($total, $quota) {
        global $controller;
        $currentuser = ctrl_users::GetUserDetail();
<<<<<<< HEAD
<<<<<<< HEAD
        $typequota = $currentuser['' . $quota . ''];
        $type = ctrl_users::GetQuotaUsages($total, $currentuser['userid']);
        if (!fs_director::CheckForEmptyValue($type)) {
            $per = ($type / $typequota) * 100;
            $percent = round($per, 0);
            $line = "<img src=\"etc/lib/pChart2/zpanel/zProgress.php?percent=" . $percent . "\"/>";
        } else {
            $line = "<img src=\"etc/lib/pChart2/zpanel/zProgress.php?percent=0\"/>";
        }
        if ($type == $typequota) {
            $line = "<img src=\"etc/lib/pChart2/zpanel/zProgress.php?percent=100\"/>";
        }
        return $line;
    }

    static function getModuleDesc() {
        $message = ui_language::translate(ui_module::GetModuleDescription());
        return $message;
    }

    static function getModuleName() {
        $module_name = ui_language::translate(ui_module::GetModuleName());
        return $module_name;
=======
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
        $typequota = $currentuser[$quota];
        $type = ctrl_users::GetQuotaUsages($total, $currentuser['userid']);
        if ($typequota == 0)
          return ''; //Quota are disabled
        if (fs_director::CheckForEmptyValue($type)) 
          return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=0"/>';
        if ($type == $typequota) 
          return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=100"/>';
        return '<img src="etc/lib/pChart2/zpanel/zProgress.php?percent=' . round($type / $typequota * 100, 0) . '"/>';
    }

    static function getModuleDesc() {
        return ui_language::translate(ui_module::GetModuleDescription());
    }

    static function getModuleName() {
        return ui_language::translate(ui_module::GetModuleName());
<<<<<<< HEAD
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
=======
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
    }

    static function getModuleIcon() {
        global $controller;
<<<<<<< HEAD
<<<<<<< HEAD
        $module_icon = "modules/" . $controller->GetControllerRequest('URL', 'module') . "/assets/icon.png";
        return $module_icon;
=======
        return 'modules/' . $controller->GetControllerRequest('URL', 'module') . '/assets/icon.png';
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
=======
        return 'modules/' . $controller->GetControllerRequest('URL', 'module') . '/assets/icon.png';
>>>>>>> ee7d29f... Enable Diskspace=0 and Bandwidth=0 as "Unlimited"
    }

}

?>