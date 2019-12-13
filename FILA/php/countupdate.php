<?php
    @require_once("common.php");

    $id = $_GET["id"];
    $goodsCount = $_GET["goodsCount"];

    $sql = "update `fila_shoppingcar` set goodsCount = goodsCount+'$goodsCount' where id = '$id'";

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