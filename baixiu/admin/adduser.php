<?php
//登陆验证
  session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }


require_once "../config.php";

if(!isset($_POST['email'])){
  echo "请输入邮箱";
}
if(!isset($_POST['name'])){
  echo "请输入名称";
}
if(!isset($_POST['nickname'])){
  echo "请输入昵称";
}
if(!isset($_POST['pwd'])){
  echo "请输入密码";
}

$email = $_POST['email'];
$name = $_POST['name'];
$nickname = $_POST['nickname'];
$pwd = $_POST['pwd'];


// echo "$email";
// echo "$name";
// echo "$nickname";
// echo "$pwd";


$link = new mysqli($servername, $username, $password, $dbname);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 


  $link->query("set names 'utf8'");


  $sql = "INSERT INTO users (email,password,name,nickname,statuss) values ('$email','$pwd','$name','$nickname','on')";

  $result = $link->query($sql);

  if(!$result){
    echo "添加失败";
    exit;
  }
  echo "添加成功";
  header('Location:/baixiu/admin/users.php');

  
 

  $link->close();


