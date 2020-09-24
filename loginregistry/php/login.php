<?php
include "conn.php";//后端与数据库进行连接
if(isset($_POST['user']) && isset($_POST['pass'])){//判断两个条件在不在，（与的条件是一假直接走，一真为二值）
    $user = $_POST['user'];//从前端得到值
    $pass = $_POST['psss'];
    $result= $conn->query("select * from registry where username='$user' and password='$pass'");//从前端得到的值给数据库进行查询，看是不是存在
    if($result->fetch_assoc()){//判断条件是不是存在的语句，存在就相当于登录成功，
        echo true;
    }else{//不存在就相当于登录失败了
        echo false;
    }
}