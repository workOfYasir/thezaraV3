<?php 

include("../assets/includes/controller.php");
include("../assets/includes/inc/config.php");
if(isset($_POST['id'])) {$id=$_POST['id'];   }
if (isset($_POST['pd_id'])) { $date =  $_POST['pd_id'];}
if(isset($_POST['sehar'])) {$sehar_time=$_POST['sehar'];  if($sehar_time==''){unset($sehar_time);}} 
if(isset($_POST['iftar'])) {$iftar_time=$_POST['iftar'];  if($iftar_time==''){unset($iftar_time);}} 

echo $id;
echo $date;
if(
isset($date)
&& isset($id)
){
   
    if($id==''){
        
        $result22 = mysqli_query($servercnx,"INSERT INTO `roza_time`(`date_id`, `sehar`, `iftar`) VALUES ('$date','$sehar_time','$iftar_time')");
        if($result22){
       
            header("Location: ../View-Roza.php");
         }else{ 
             header("Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>");
         }
   
    }else{
        echo $sehar_time.'<br>'.$iftar_time.'<br>'.$date.'<br>'.$id;
    $result = mysqli_query($servercnx,"UPDATE `roza_time` SET 
    `date_id` = '$date',
    `sehar` = '$sehar_time',
    `iftar` = '$iftar_time'
    WHERE id = '$id' ");
    if($result){
       
       header("Location: ../View-Roza.php");
    }else{ 
        header("Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>");
    }
    }
    
        
    }else{ header("Error Adding<br /><FORM><INPUT TYPE='button' VALUE='Back' onClick='history.go(-1);return true;'> </FORM>");
    }
