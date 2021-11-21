<?php 
include("assets/includes/controller.php");
$pagename = 'security';
$container = 'settings';
if(!$session->isSuperAdmin()){
    header("Location: ".$configs->homePage());
    exit;
}
else{
include("assets/includes/inc/Main-Header.php");
?> 
            <!-- Page Content -->
            <div id="page-content" class="gray-bg">

                <!-- Title Header -->
                <div class="title-header white-bg">
                    <i class="fas fa-lock"></i>
                    <h2>Security Settings</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            Security Settings
                        </li>
                    </ol>
                </div>
                <!-- END Title Header -->
                
                <div class="row">                                     
                    <div class="col-sm-12 col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <h4><strong>Security Settings</strong></h4>
                            </div>
                        </div>
                    </div>                                     
                </div>
             
                <div class="row">                    
                    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Disallow Usernames - Prevent Usernames from being registered</h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="security-form-validation" role="form" action="assets/includes/adminprocess.php" method="POST"> 
                                    <div class="form-group">
                                        <label for="usernametoban" class="col-sm-3 control-label">Disallow Username <span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input class="form-control" name="usernametoban"  id="usernametoban" placeholder="Required Field..">
                                                <span class="input-group-addon"><i class="fas fa-question-circle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <?php echo $adminfunctions->stopField($session->username, 'configs'); ?>
                                            <input type="hidden" name="form_submission" value="disallow_user">
                                            <button type="submit" class="btn btn-default">Add Username</button>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal" id="security-form-validation2" role="form" action="assets/includes/adminprocess.php" method="POST">
                                    <div class="form-group">
                                        <label for="disallow_username" class="col-sm-3 control-label">Disallowed Usernames </label>
                                        <div class="col-sm-6">
                                        <select name="username_tounban" id="username_tounban" class="form-control" multiple="multiple">
                                        <?php
                                        $sql = "SELECT ban_username, ban_id FROM banlist WHERE ban_username != '0'";
                                        $result = $db->prepare($sql);
                                        $result->execute();
                                        while ($row = $result->fetch()) {
                                            $username = $row['ban_username'];
                                            $ban_id = $row['ban_id'];
                                            echo "<option value='$ban_id'>$username</option>";
                                        }
                                        ?>
                                        </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <?php echo $adminfunctions->stopField($session->username, 'configs'); ?>
                                            <input type="hidden" name="form_submission" value="undisallow_user">
                                            <button type="submit" class="btn btn-default">Remove Disallowed Usernames</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8 col-lg-offset-0 col-lg-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Ban IP Addresses from Registering (or logging in)</h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="security-form-validation3" role="form" action="assets/includes/adminprocess.php" method="POST"> 
                                    <div class="form-group">
                                        <label for="ip_address" class="col-sm-3 control-label">Block / Ban IP Address <span class="text-danger">*</span></label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <input class="form-control" name="ipaddress"  id="ip_address" placeholder="e.g. 192.168.0.1 without leading zeros">
                                                <span class="input-group-addon"><i class="fas fa-question-circle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <?php echo $adminfunctions->stopField($session->username, 'configs'); ?>
                                            <input type="hidden" name="form_submission" value="ban_ip">
                                            <button type="submit" class="btn btn-default">Add IP Address</button>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal" id="security-form-validation4" role="form" action="assets/includes/adminprocess.php" method="POST">
                                    <div class="form-group">
                                        <label for="banned_ip" class="col-sm-3 control-label">Banned IP Addresses </label>
                                        <div class="col-sm-6">
                                        <select name="ipaddress" id="ipaddress" class="form-control" multiple="multiple">
                                        <?php
                                        $sql2 = "SELECT ban_ip FROM banlist WHERE ban_ip != '0'";
                                        $result2 = $db->prepare($sql2);
                                        $result2->execute();
                                        while ($row2 = $result2->fetch()) {
                                            $ipaddress = $row2['ban_ip'];
                                            echo "<option value='$ipaddress'>$ipaddress</option>";
                                        }
                                        ?>
                                        </select> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <?php echo $adminfunctions->stopField($session->username, 'configs'); ?>
                                            <input type="hidden" name="form_submission" value="unban_ip">
                                            <button type="submit" class="btn btn-default">Remove Banned IP Addresses</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                                     
                </div>
                <!-- END Row -->

<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
<?php } ?>