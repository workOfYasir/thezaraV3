<?php 
include("assets/includes/controller.php");
$pagename = 'summary';
$container = '';
if(!$session->isAdmin() || !isset($_SESSION['regsuccess'])){
    header("Location: ".$configs->homePage());
    exit;
}
else{
$form = new Form();
include("assets/includes/inc/Main-Header.php");
?>    

            <!-- Page Content -->
            <div id="page-content" class="gray-bg">

                <!-- Title Header -->
                <div class="title-header white-bg">
                    <i class="fas fa-star"></i>
                    <h2>Summary</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            Summary
                        </li>
                    </ol>
                </div>
                <!-- END Title Header -->
             
                <div class="row">
                    <div class="col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10">
                        <div class="panel">

                            <div class="panel-body">
                                <?php
                                /* Registration Successful */
                                if($_SESSION['regsuccess']==0 || $_SESSION['regsuccess'] == 5){
                                    echo "<div class='login'><h1>Registered!</h1>";
                                    echo "<p>Thank you Admin, <strong>".$_SESSION['reguname']."</strong> has been added to the database.</p></div>";
                                }
                                /* Registration failed */
                                else if ($_SESSION['regsuccess'] == 2) {
                                    echo "<div class='login'><h1>Registration Failed</h1>";
                                    echo "<p>We're sorry, but an error has occurred and your registration for the username <strong>".$_SESSION['reguname']."</strong>"
                                    . " could not be completed.<br><br>Please try again.</p>";
                                    echo "<p>".Form::$num_errors." error(s) found</p>";
                                    foreach (Form::getErrorArray() as $key => $value) {
                                        echo "<p> * ".$value."</p>";
                                    }
                                    echo "</div>";
                                }
                                unset($_SESSION['regsuccess']);
                                unset($_SESSION['reguname']);
                                ?>              
                            </div>

                        </div>
                    </div>
                </div>
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
<?php } ?>