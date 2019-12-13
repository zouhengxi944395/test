<?php
    @require_once("common.php");


    $key = $_GET["key"];
    $orderCol = $_GET["orderCol"];
    $orderType = $_GET["orderType"];

    $sql = "select count(*) from `fila_goodslist` where goodsName like '%$key%' order by $orderCol $orderType";

    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);

    $msg = array("count"=>$item[0]);

    echo json_encode($msg);

?>