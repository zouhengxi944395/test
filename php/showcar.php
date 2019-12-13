<?php
    @require_once("common.php");

    $phone = $_GET["phone"];

    $sql = "select goodsId,goodsImg,goodsName,goodsSize,goodsCount,goodsPrice from `fila_shoppingcar` where phone='$phone' ";
    // echo $sql;
    $result = mysql_query($sql);

    $all = array();

    while($item=mysql_fetch_assoc($result)){
        $all[] = $item;
    }

    echo json_encode($all);

?>