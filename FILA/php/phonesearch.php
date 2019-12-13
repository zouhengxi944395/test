<?php

    @require_once("common.php");

    $goodsId = $_GET["goodsId"];
    $goodsSize = $_GET["goodsSize"];
    $phone = $_GET["phone"];

    $sql = "select id from `fila_shoppingcar` where phone='$phone' and goodsSize='$goodsSize' and goodsId='$goodsId'";

    $result = mysql_query($sql);

    $all = array();

    while($item=mysql_fetch_assoc($result)){
        $all[] = $item;
    }

    echo json_encode($all);

?>