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
session_start();
if (isset($_SESSION['zpuid'])) {
    $userid = $_SESSION['zpuid'];
    $currentuser = ctrl_users::GetUserDetail($userid);
    ?>
      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>ZPanel &gt; Run Daemon</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="../../../etc/styles/<?php echo $currentuser['usertheme']; ?>/css/default.css" rel="stylesheet" type="text/css">
          <link href="../../../etc/styles/<?php echo $currentuser['usertheme']; ?>/css/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
          <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
          <script src="../assets/ajaxsbmt.js" type="text/javascript"></script>
          <script>window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">\x3C<\/script>')</script>
          <script>window.jQuery || document.write('<script src="<# ui_tpl_assetfolderpath #>js/jquery-1.9.1.min.js">\x3C<\/script>')</script>
        <body>

          <fieldset style="padding:20px 20px 0 20px;">

            <legend class="module-legend">
              ZPanel Daemon
            </legend>

            <p>Please note that depending on your configuration, running the daemon may take a lot of time.  Be patient until the script is complete and the results are displayed.</p>

            <div id="RunSubmit" style="height:100%;margin:auto;">
              <form class="form-horizontal" name="doBackup" action="../../../bin/daemon.php" method="post" onsubmit="xmlhttpPost('../../../bin/daemon.php', 'doBackup', 'RunResult', 'Running the daemon!, please wait...<br><img src=\'../assets/bar.gif\'>'); return false;">
                <div class="control-group">
                  <button class="btn" id="SubmitRun" type="submit" value="">Run Now</button>
                  <input type="hidden" name="inDownLoad" id="inDownLoad" value="1" />
                </div>
              </form>
            </div>

            <div id="RunResult" style="display:block;height:100%;margin:auto;">
              Running the daemon!, please wait...<br><img src='../assets/bar.gif'>
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
        $("#RunResult").hide();
        $("#SubmitRun").click(function(){
            $("#RunSubmit").hide();
            $("#RunResult").show();
        }); 
    })
</script>