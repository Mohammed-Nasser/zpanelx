/* Update SQL for Ubuntu 12 ZPanel 10.0.0 to 10.0.1 */
USE `zpanel_core`;
/* Adds the new fields for customising vhost configs */
ALTER TABLE `zpanel_core`.`x_vhosts`
ADD COLUMN `vh_custom_port_in` INT(6) NULL DEFAULT NULL  AFTER `vh_custom_tx` ,
ADD COLUMN `vh_portforward_in` INT(1) NULL DEFAULT '1'  AFTER `vh_custom_port_in` ,
ADD COLUMN `vh_custom_ip_vc` VARCHAR(45) NULL DEFAULT NULL  AFTER `vh_portforward_in` ;

/* New Postfix User for new postfix configs */
CREATE USER postfix@localhost IDENTIFIED BY 'postfix';
GRANT ALL PRIVILEGES ON zpanel_postfix . * TO postfix@localhost;
FLUSH PRIVILEGES;

USE `zpanel_proftpd`;
/* Change the Uid and Gid of all FTP users to enable editing of apache owned files */
ALTER TABLE `zpanel_proftpd`.`ftpuser`
CHANGE COLUMN `uid` `uid` SMALLINT(6) NOT NULL DEFAULT '33'  ,
CHANGE COLUMN `gid` `gid` SMALLINT(6) NOT NULL DEFAULT '33'  ;
UPDATE `zpanel_proftpd`.`ftpuser` SET `uid`='33', `gid`='33';

/* Update the ZPanel database version number */
UPDATE  `zpanel_core`.`x_settings` SET  `so_value_tx` =  '10.0.1' WHERE  `so_name_vc` = 'dbversion';