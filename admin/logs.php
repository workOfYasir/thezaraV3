<?php 
include("assets/includes/controller.php");
$pagename = 'logs';
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
                    <i class="fas fa-chart-bar"></i>
                    <h2>Logs</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            Logs
                        </li>
                    </ol>
                </div>
                <!-- END Title Header -->
             
                <div class="row">                                     
                    <div class="col-md-9 col-lg-10">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">Logs</h2>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Event</th>
                                                <th>Date / Time</th>
                                                <th>IP Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM log_table ORDER BY timestamp DESC";
                                            $result = $db->prepare($sql);
                                            $result->execute();
                                            while ($row = $result->fetch()) {
                                                
                                                $username = $functions->getUserInfoSingularFromId('username', $row['userid']);

                                                echo "<tr>";
                                                echo "<td>$username</td>";
                                                echo "<td>".$row['log_operation']."</td>";
                                                echo "<td>".$adminfunctions->displayDate($row['timestamp'])."</td>";
                                                echo "<td>".$row['ip']."</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <div class="panel">
                            <div class="panel-body">
                            <form action="assets/includes/logprocess.php" id="user-groups-edit" class="form-horizontal" method="post">
                                <input type="Submit" class="btn btn-main" value="Delete All Logs" onclick="return confirm ('Are you sure you want to delete all the logs, this cannot be undone?')">
                                <input type="hidden" name="form_submission" value="delete_logs">
                            </form>
                                <br>
                            <form action="assets/includes/logprocess.php" id="user-groups-edit" class="form-horizontal" method="post">
                                <input type="Submit" class="btn btn-main" value="Delete Logs (> 30 days)" onclick="return confirm ('Are you sure you want to delete some logs, this cannot be undone?')">
                                <input type="hidden" name="form_submission" value="delete_some_logs">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
        
<script>
$(document).ready(function () {
$('#dataTable').dataTable({         
"order": [[ 2, "desc"]],
"pageLength": 25
});
});
</script>       
<?php include("assets/includes/inc/Main-Footer.php"); ?>
</body>
</html>
<?php } ?>