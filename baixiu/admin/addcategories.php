<?php

//登陆验证
  session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }


require_once "../config.php";


$title = isset($_POST['title'])?$_POST['title']:'test';
$alias = isset($_POST['alias'])?$_POST['alias']:'testing';




$link = new mysqli($servername, $username, $password, $dbname);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 


  $link->query("set names 'utf8'");


  $sql = "INSERT INTO categories(title,alias) values('$title','$alias')";

  $result = $link->query($sql);

  if(!$result){
    echo "添加失败";
    exit;
  }
  echo "添加成功";
  header('Location:/baixiu/admin/categories.php');

  
 

  $link->close();


