<?php

//登陆验证
  session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }

  $email = $_SESSION['current_user'];


require_once "../config.php";


$oldpwd = isset($_POST['oldpwd'])?$_POST['oldpwd']:'';
$newpwd = isset($_POST['newpwd'])?$_POST['newpwd']:'';
$newpwd2 = isset($_POST['newpwd2'])?$_POST['newpwd2']:'';

if($newpwd !== $newpwd2){
  echo "两次输入密码不正确";
}


$link = new mysqli($servername, $username, $password, $dbname);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 


  $link->query("set names 'utf8'");


  $sql = "select password from users where email = '$email'";
  

  $result = $link->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {

        //echo "$row[password]";
        if(@$row[password] !== $oldpwd){
          echo "<br>原密码不正确";
        }

       /* $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $conn->query("set names 'utf8'");*/
        $sql = "update users t set t.password = '$newpwd' where t.email = '$email'";

        $result = $link->query($sql);
        if(!$result){
          echo "<br>修改失败";
          exit;
        }
        echo "修改成功";
        header('Location:/baixiu/admin/password-reset.php');

        //$conn->close();
    }
} else {
    echo "0 results";
}


  $link->close();
