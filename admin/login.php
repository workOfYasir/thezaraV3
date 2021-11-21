<?php
include("assets/includes/controller.php");
if ($session->isAdmin()) {
    header("Location: " . $configs->homePage());
    exit;
}
$form = new Form;
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo SITE_NAME ?> - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("assets/includes/inc/logincss.php"); ?>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <img src="../images/logo.png" alt="Thezara.co.uk By Mates Technologies">
                </div>
                <form class="login100-form validate-form" action="assets/includes/process.php" method="POST">
                    <span class="login100-form-title"><small><?php echo SITE_NAME ?> - Login</small></span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="username" placeholder="Enter Username" value="<?php echo Form::value("username"); ?>" />
                        <?php if (Form::error("username")) {
                            echo "<div class='help-block' id='user-error' style='color: red;'>" . Form::error('username') . "</div>";
                        } ?><br>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" value="<?php echo Form::value("password"); ?>" />
                        <?php if (Form::error("password")) {
                            echo "<div class='help-block' id='pass-error' style='color: red;'>" . Form::error('password') . "</div>";
                        } ?>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                        <input type="hidden" name="form_submission" value="adminlogin">
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#" onclick='return DisplayError()'>
                            Username / Password?
                        </a>
                    </div>
                    <div class="text-center p-t-136">
                        <div class='help-block' id='forgrtError' style='color: red; display: none;'></div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            Designed and Developed by<a href="<?php echo DEV_URL ?>" title="<?php echo DEV_NAME ?>" target="_blank" style="text-decoration: none;"> <?php echo DEV_NAME ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Resources -->
    <script src="assets/js/jquery-2.1.3.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/admin-login.js"></script>
    <script>
        $(function() {
            Login.init();
        });
    </script>
    <script>
        // Initialize Tooltips
        $('[data-toggle="tooltip"], .show-tooltip').tooltip({
            container: 'body',
            animation: false
        });
    </script>
    <script type='text/javascript'>
        function DisplayError() {
            document.getElementById("forgrtError").style.display = "block";
        }
    </script>
    <?php include("assets/includes/inc/loginjs.php"); ?>
</body>

</html>