<?php 
include("assets/includes/controller.php");
$pagename = 'help';
$container = '';
if(!$session->isAdmin()){
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
                    <i class="fas fa-question-circle"></i>
                    <h2>Help / Support</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            Help / Support
                        </li>
                    </ol>
                </div>
                <!-- END Title Header -->
             
                <div class="row">                                     
                    <div class="col-sm-8 col-md-9">
                        <div class="panel">
                            <div class="panel-body">
                                <h4><strong>Xavier PHP Login Script & User Management</strong></h4>
                                Designed and Coded by <a href="http://www.angry-frog.com" target="_blank">Angry Frog</a> using the <a href="http://www.angry-frog.com/xavier-responsive-admin-theme/" target="_blank">Xantia Admin Theme</a> template.<br><br>
                                Support for the script can be found in a number of places including the documentation. If you uploaded the documentation folder along with your script, you can find it <a href='../documentation/index.html'>here</a>.<br><br>
                                Or visit the Angry Frog website where there is lots of information including a message board <a href="http://www.angry-frog.com">here</a>.<br><br>
                                If you need to contact the author about an issue with the script, you can use the Comments section on the CodeCanyon (Envato) <a href="http://codecanyon.net/item/angry-frog-php-login-script/9146226" target="_blank">here</a> or Codester website depending on where you purchased it.<br><br>
                                <h4><strong>Disclaimer</strong></h4>
                                This script is intended for general use and no warranty is implied for suitability to any given task. I hold no responsibility for your setup or any damage done while using/installing/modifying this script or any of its plugins. 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="panel">
                            <div class="panel-body">
                                <h4><strong>Stats</strong></h4>
                                <?php 
                                echo "<br>\nVersion: ".$configs->getConfig('Version')."<br>\n<br>\n";
                                $result = $db->query('select version()')->fetchColumn();
                                echo "MySQL Version : ".$result."<br>\n";
                                echo "PHP Version : ".phpversion()."<br>\n<br>\n";
                                ?>
                                Changelog : <a href="../changelog.txt" target="_blank">Changelog</a>
                            </div>
                        </div>
                    </div>
                </div>

<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
<?php } ?>