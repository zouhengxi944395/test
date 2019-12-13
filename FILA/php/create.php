<?php
    @require_once("common.php");

    $key = $_GET["key"];
    $orderCol = $_GET["orderCol"];
    $orderType = $_GET["orderType"];
    $pageIndex = $_GET["pageIndex"];
    $showNum = $_GET["showNum"];

    $skipNum = $pageIndex * $showNum;

    $sql = "select id,goodsName,goodsPrice,goodsImg from `fila_goodslist` where goodsName like '%$key%' order by $orderCol $orderType limit $skipNum,$showNum";
// echo $sql;
    $result = mysql_query($sql);

    $all = array();

    while($item=mysql_fetch_assoc($result)){
        $all[] = $item;
    }

    echo json_encode($all);

?>