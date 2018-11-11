<?php

//登陆验证
  session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }


require_once "../config.php";


$title = isset($_POST['title'])?$_POST['title']:'test';
$content = isset($_POST['content'])?$_POST['content']:'testing';
$author = isset($_POST['name'])?$_POST['name']:'user';
$imgsrc = isset($_POST['feature'])?$_POST['feature']:'c://abx/.jpg';

//获取选择的option
$class = isset($_POST['select_content1'])?$_POST['select_content1']:'未分类';

$times = isset($_POST['times'])?$_POST['times']:'2018/11/01';

$statuss = isset($_POST['select_content2'])?$_POST['select_content2']:'草稿';





$link = new mysqli($servername, $username, $password, $dbname);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 


  $link->query("set names 'utf8'");


  $sql = "INSERT INTO articles (titles,content,author,imgsrc,class,times,statuss) values('$title','$content','$author','$imgsrc','$class','$times','$statuss')";

  $result = $link->query($sql);

  if(!$result){
    echo "添加失败";
    exit;
  }
  echo "添加成功";
  header('Location:/baixiu/admin/posts.php');

  
 

  $link->close();


