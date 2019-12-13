<?php
    @require_once("common.php");

    $id = $_GET["id"];

    $sql = "select id,goodsName,goodsPrice,goodsImg,salePrice,imgList,color from `fila_goodslist` where id=$id";
    
    $result = mysql_query($sql);

    $all = array();

    while($item=mysql_fetch_assoc($result)){
        $all[] = $item;
    }

    echo json_encode($all);

?>