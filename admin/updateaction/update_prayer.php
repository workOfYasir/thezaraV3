<?php 

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['pd_id'])) {$pd_id=$_POST['pd_id'];   }
if(isset($_POST['pt_id'])) {$pt_id=$_POST['pt_id'];  }
if (isset($_POST['prayer_date'])) { $prayer_date =  $_POST['prayer_date'];}
if(isset($_POST['fajar_time'])) {$fajar_time=$_POST['fajar_time'];  }
if(isset($_POST['zohar_time'])) {$zohar_time=$_POST['zohar_time'];  }
if(isset($_POST['asr_time'])) {$asr_time=$_POST['asr_time'];  }
if(isset($_POST['magrib_time'])) {$magrib_time=$_POST['magrib_time']; }
if(isset($_POST['isha_time'])) {$isha_time=$_POST['isha_time'];  } 
 
if(
isset($prayer_date)
&& isset($pd_id)
&& isset($pt_id)
// && isset($fajar_time)
// && isset($zohar_time)
// && isset($asr_time)
// && isset($magrib_time)
// && isset($isha_time)
){

    $result = mysqli_query($servercnx,"UPDATE prayer_time SET fajar = '$fajar_time',
    zohar ='$zohar_time',
    asr ='$asr_time',
    magrib ='$magrib_time',
    isha ='$isha_time'
   
    WHERE pt_id = '$pt_id' AND prayer_date_id = '$pd_id'");
    if($result){
        $result2 = mysqli_query($servercnx,"UPDATE date_prayer SET prayer_date = '$prayer_date' WHERE pd_id = '$pd_id'");
        if($result2){
            header("Location: ../View-PrayerTime.php");
        }else{
            header("Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>");
        }
    }else{echo 'q 1 nhe chli';}
    }else{echo 'if nhe chl rhi';}
