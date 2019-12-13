<?php

    @require_once("common.php");

    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $sql = "select * from `fila_userinfo` where phone='$phone' and password='$password'";

    $result = mysql_query($sql);

    $item = mysql_fetch_array($result);

    $msg = array();

    if($item){
        $msg["status"]=true;
        $msg["phone"] = $item[1];
        $msg["msg"]="登录成功!";
    }
    else{
        $msg["status"]=false;
        $msg["msg"]="用户名或密码有误!";
    }

    echo json_encode($msg);







?>