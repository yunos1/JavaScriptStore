<?php

session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }

require_once "../config.php";

//接受email
$email = $_GET['email'];

//连接数据库
$link = new mysqli($servername, $username, $password, $dbname);

//连接失败
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 

//发送编码
  $link->query("set names 'utf8'");

//查询语句
  $sql = "DELETE from users where email = '$email'";

//发送并接受结果
  $result = $link->query($sql);
  if(!$result){
    echo "删除失败";
    exit;
  }
  echo "删除成功"; 
  //跳转页面
  header('Location:/baixiu/admin/users.php');

  
 
//关闭连接
  $link->close();




