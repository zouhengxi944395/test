<?php
    @require_once("common.php");

    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $search_sql=" SELECT * FROM `fila_userinfo` where phone = '$phone'";

    $result = mysql_query($search_sql);
    
    $item = mysql_fetch_array($result);
    
    $msg = array();

    if($item){
        $msg["status"] = 0;
        $msg["msg"] = "手机号已存在!";
    }else{

        $insert_sql = "insert into `fila_userinfo`(phone,password) values('$phone','$password')";
        
        mysql_query($insert_sql);

        $row = mysql_affected_rows();

        $msg = array();
        if($row>0){
            $msg["status"] = 1;
            $msg["msg"] = "新增成功！";
        }else{
            $msg["status"] = 2;
            $msg["msg"] = "新增失败！";
        }
    }

    echo json_encode($msg); 

?>