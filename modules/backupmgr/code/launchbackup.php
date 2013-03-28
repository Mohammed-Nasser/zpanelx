<?php
include('../../../cnf/db.php');
include('../../../dryden/db/driver.class.php');
include('../../../dryden/debug/logger.class.php');
include('../../../dryden/runtime/dataobject.class.php');
include('../../../dryden/sys/versions.class.php');
include('../../../dryden/ctrl/options.class.php');
include('../../../dryden/ctrl/auth.class.php');
include('../../../dryden/ctrl/users.class.php');
include('../../../dryden/fs/director.class.php');
include('../../../inc/dbc.inc.php');
try {
    $zdbh = new db_driver("mysql:host=localhost;dbname=" . $dbname . "", $user, $pass);
} catch (PDOException $e) {
    exit();
}
if (isset($_GET['id'])) {
    $userid = $_GET['id'];
} else {
    $userid = NULL;
}
session_start();
if ($_SESSION['zpuid'] == $userid) {
    $currentuser = ctrl_users::GetUserDetail($userid);
    ?>
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>ZPanel &gt; Back-Ups</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="../../../etc/styles/<?php echo $currentuser['usertheme']; ?>/css/default.css" rel="stylesheet" type="text/css">
          <link href="../../../etc/styles/<?php echo $currentuser['usertheme']; ?>/css/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
          <script src="../assets/ajaxsbmt.js" type="text/javascript"></script>
          <script>window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">\x3C<\/script>')</script>
          <script>window.jQuery || document.write('<script src="<# ui_tpl_assetfolderpath #>js/jquery-1.9.1.min.js">\x3C<\/script>')</script>
        </head>
        <body>
      
          <fieldset style="padding:20px 20px 0 20px;">

            <legend class="module-legend">
              Backup your hosting account files
            </legend>

            <p>Your data is ready to be backed up. This proccess can take a lot of time, depending on your directory size. When finished you will be prompted to download your archive.</p>

            <p>Current public directory size: <b><?php echo fs_director::ShowHumanFileSize(dirSize(ctrl_options::GetSystemOption('hosted_dir') . $currentuser['username'] . "/public_html")); ?></b></p>

            <div id="BackupSubmit" style="height:100%;margin:auto;">
              <form class="form-horizontal" name="doBackup" action="response_normal.php" method="post" onsubmit="xmlhttpPost('dobackup.php?id=<?php echo $userid; ?>', 'doBackup', 'BackupResult', 'Compressing your data, please wait...<br><img src=\'../assets/bar.gif\'>'); return false;">
                <div class="control-group">
                  <button class="btn" id="SubmitBackup" type="submit" name="inBackUp" value="">Backup Now</button>
                  <input type="hidden" name="inDownLoad" id="inDownLoad" value="1" />
                </div>
              </form>
            </div>

            <div id="BackupResult" style="display:block;height:100%;margin:auto;">
              Compressing your data, please wait...<br><img src='../assets/bar.gif'>
            </div>

          </fieldset>

        </body>

      </html>

    <?php } else {
    ?>

    <body>

      <fieldset style="padding:20px 20px 0 20px;">

        <legend class="module-legend">
          Unauthorized Access!
        </legend>

        <div class="fluid-row text-center">
          You have no permission to view this module.
        </div>

      </fieldset>

    </body>

<?php } ?>

<script type="text/javascript">
    $(document).ready(function() { 
        $("#BackupResult").hide();
        $("#SubmitBackup").click(function(){
            $("#BackupSubmit").hide();
            $("#BackupResult").show();
        }); 
    })
</script>

<?php

function dirSize($directory) {
    $size = 0;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file) {
        $size+=$file->getSize();
    }
    return $size;
}
?>