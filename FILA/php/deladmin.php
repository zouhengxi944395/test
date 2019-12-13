<?php
    @require_once("common.php");

    $goodsId = $_GET["goodsId"];
    $goodsSize = $_GET["goodsSize"];
    $goodsCount = $_GET["goodsId"];

    $sql = "delete from `fila_shoppingcar` where goodsId='$goodsId' and goodsSize='$goodsSize' and goodsCount='$goodsCount'";

    $result = mysql_query($sql);

    $row = mysql_affected_rows();

    $msg = array();
        
    if($row>0){
        $msg["status"] = true;
        $msg["msg"] = "删除成功！";
    }
    else{
        $msg["status"] = false;
        $msg["msg"] = "删除失败！";
    }
   
    echo json_encode($msg);

?>