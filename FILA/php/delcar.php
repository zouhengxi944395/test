<?php

    @require_once("common.php");

    $phone = $_GET["phone"];
    $goodsId = $_GET["goodsId"]; // shoppingcar  表数据的 编号 

    $sql = "delete from `fila_shoppingcar` where goodsId='$goodsId' and phone='$phone'";

    mysql_query($sql);

    // echo $sql;

    $row = mysql_affected_rows();

    $msg = array();
    
    if($row>0){
        $msg["status"] = true;
        $msg["msg"] = "删除成功！";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "删除失败！";
    }

    echo json_encode($msg);


?>