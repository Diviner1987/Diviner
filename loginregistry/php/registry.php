<?php 
include "conn.php";
//与数据库进行连接
if(isset($_POST['name']) || isset($_POST['submit'])){//看输入的用户名称是不是存在，从数据库里面的查找，符合条件的，(或的条件是一真直接走，一假为二值),不执行name的话就走submit，就不会有非法操作的提示，如果执行的话就是非法操作，是不能直接去访问后端的
      $user = $_POST['name'];//从前端 取到需要查询的信息
      $result = $conn->query("select * from registry where username='$user'" );//将查询的结果作为一个结果集存着
      if($result->fetch_assoc()){//结果集是不是存在的语句，存在返回true，不存在返回false
      echo true;
      }
      else{
      echo false;
      }
}else{
   exit('非法操作');
}
if(isset($_POST['submit'])){//是否点击了submit，然后执行他后面的语句
   $user = $_POST['username'];//从前端得到值
   $pass = sha1($_POST['password']);//密码传给后端的时候需要进行加密，加密记得调函数
   $email =$_POST['email'];
   $conn->query("insert registry values(default,'$user','$pass','$email',NOW())");//从前端得到的值再传入数据库
   header('location:http://localhost/loginregistry/src/login.html');//注册成功之后跳转到登录页面
}





