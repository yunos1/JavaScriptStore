<?php


require_once "../config.php";

//给用户定义一个状态

session_start();

if(!isset($_POST['email'])){
  echo "请输入邮箱";
}
if(!isset($_POST['pwd'])){
  echo "请输入密码";
}


// if(!(isset($_POST['email']) || isset($_POST('pwd')){
//   echo "请输入用户名和密码";
// }

$email = $_POST['email'];
$pwd = $_POST['pwd'];

// 创建连接
$link = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 

//设置编码
  $link->query("set names 'utf8'");

  // $sql = "select email,name,nickname,statuss from users";

//从数据库中查询email和password 是否匹配
  $sql = "select * from users where (email='$email') and (password='$pwd')";
//发送查询语句
  $result = $link->query($sql);

//读取数据到最后一行
  if ($result->num_rows > 0) {
    
      //读取每行数据
      while($row = $result->fetch_assoc()) {


        //session存一个登陆标识
        //$_SESSION['is_logined'] = true;
        
        $_SESSION['current_user'] = $email;


        //跳转首页
          header('Location:/baixiu/admin/index.php');

          //echo "<br>尊敬的".$row['email']."用户,你好！";

          // echo "<br> email: ". $row["email"]. "  Name: ". $row["name"]. " Nickname: " . $row["nickname"]." Statuss: ".$row["statuss"];
    } 

  }else {
    echo "用户名或密码错误!!!";
    exit;
  }

//关闭连接
  $link->close();




  // $arrays = [];

  // //解析结果
  // while($row = @mysqli_fetch_assoc($res)){
  //   $arrays[] = $row;
  // }

  // var_dump($arrays);

?>





