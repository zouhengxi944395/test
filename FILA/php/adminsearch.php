<?php

    @require_once("common.php");

    $sql = "select goodsId,goodsSize,goodsCount from `fila_shoppingcar` where phone='admin'";

    $result = mysql_query($sql);

    $all = array();

    while($item=mysql_fetch_assoc($result)){
        $all[] = $item;
    }

    echo json_encode($all);

?>