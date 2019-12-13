<?php
    @require_once("common.php");

    $phone = $_GET["phone"];

    $sql = "update `fila_shoppingcar` set phone = '$phone' where phone = 'admin'";

    $result = mysql_query($sql);

    $row = mysql_affected_rows();

    $msg = array();
        
    if($row>0){
        $msg["status"] = true;
        $msg["msg"] = "更新成功！";
    }
    else{
        $msg["status"] = false;
        $msg["msg"] = "更新失败！";
    }
   
    echo json_encode($msg);

?>