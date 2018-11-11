
<?php
  //登陆验证
  session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }
  
  require_once "../config.php";

  // 创建连接
$link = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
//设置编码，发送sql语句
  $link->query("set names 'utf8'");
  $sql = "select * from categories";

  $result = $link->query($sql);

  $arrays = [];

  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      $arrays[] = $row;
    }
} else {
    echo "0 results";
}



//关闭连接
$link->close();

?>





<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <title>Add new post &laquo; Admin</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>

<body>
    <script>
    NProgress.start()
    </script>
    <div class="main">
        <nav class="navbar">
            <button class="btn btn-default navbar-btn fa fa-bars"></button>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
                <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="page-title">
                <h1>写文章</h1>
            </div>
            <form method="POST" action="addarticles.php" class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">标题</label>
                        <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
                    </div>
                    <div class="form-group">
                        <label for="content">标题</label>
                        <textarea id="content" class="form-control input-lg" name="content" cols="30" rows="10" placeholder="内容"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="slug">别名</label>
                        <input id="slug" class="form-control" name="name" type="text" placeholder="slug">
                    </div>
                    <div class="form-group">
                        <label for="feature">特色图像</label>
                        <img class="help-block thumbnail" style="display: none">
                        <input id="feature" class="form-control" name="feature" type="file">
                    </div>
                    <div class="form-group">
                        <label for="category">所属分类</label>
                        <select id="category" class="form-control" onchange="chooseClass(this.options[this.selectedIndex].text)">

                            <?php foreach ($arrays as $key => $value): ?>
                                 <option name=""><?php echo $value['title']?></option>
                            <?php endforeach; ?>

                            <!-- <option value="未分类">未分类</option>
                            <option value="科技">科技</option>
                            <option value="知识分享">知识分享</option>
                            <option value="技术">技术</option>
                            <option value="知识产权">知识产权</option> -->


                            
                        </select>
                        <input type="hidden" id="select_content1" name="select_content1" />
                    </div>
                    <div class="form-group">
                        <label for="created">发布时间</label>
                        <input id="title" class="form-control input-lg" name="times" type="text" placeholder="时间">
                    </div>
                    <div class="form-group">
                        <label for="status">状态</label>
                        <select id="status" class="form-control" onchange="chooseStatus(this.options[this.selectedIndex].text)">
                            <option value="草稿">草稿</option>
                            <option value="发表">发表</option>
                        </select>
                        <input type="hidden" id="select_content2" name="select_content2" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="aside">
        <div class="profile">
            <img class="avatar" src="../uploads/avatar.jpg">
            <h3 class="name">易水寒</h3>
        </div>
        <ul class="nav">
            <li>
                <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
            </li>
            <li class="active">
                <a href="#menu-posts" data-toggle="collapse">
                    <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-posts" class="collapse in">
                    <li><a href="posts.php">所有文章</a></li>
                    <li class="active"><a href="post-add.php">写文章</a></li>
                    <li><a href="categories.php">分类目录</a></li>
                </ul>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
            </li>
            <li>
                <a href="users.php"><i class="fa fa-users"></i>用户</a>
            </li>
            <li>
                <a href="#menu-settings" class="collapsed" data-toggle="collapse">
                    <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
                </a>
                <ul id="menu-settings" class="collapse">
                    <li><a href="nav-menus.html">导航菜单</a></li>
                    <li><a href="slides.html">图片轮播</a></li>
                    <li><a href="settings.html">网站设置</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <script src="../assets/vendors/jquery/jquery.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script>
    NProgress.done()
    </script>
    <script>
        function chooseClass(val) {

            // var index = $("#category").selectedIndex;
            // var Tvalue = $("#category").options[index].value;
            // console.log(Tvalue);
           document.getElementById("select_content1").value = val;
           
        }

        function chooseStatus(val) {
            document.getElementById("select_content2").value = val;
        }

       /* function choose(val){
          console.log(val);
          document.getElementById("select_content2").value = val;
        
        }*/

    </script>
</body>

</html>
