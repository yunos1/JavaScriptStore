<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bokedb";






 /* 

  //验证用户是否登陆，没登陆则无法进入
  session_start();
  if(empty($_SESSION['current_user'])){

    header('Location: login.html');
  }

//创建users表
 create table users(
    id int not null auto_increment primary key,
    email varchar(20) not null COMMENT'邮箱',
    password varchar(20) not null comment'密码',
    name varchar(20) not null comment'用户',
    nickname varchar(20) not null comment'昵称',
    statuss varchar(5) not null comment'状态'
  )charset=utf8; 

//向users表插入数据
  INSERT INTO users(email,password,name,nickname,statuss) VALUES('10010@qq.com','123456','中国联通','联不通','on');


//创建comments表
  create table comments(
	id int not null auto_increment primary key,
	author varchar(10) not null comment'作者',
	commentss varchar(50) not null comment'评论',
	commby varchar(20) not null comment'评论在',
	times varchar(10) not null comment'发表于',
	statuss varchar(5) not null comment'状态'
  )charset=utf8;

//向comments表插入数据

insert into comments(author,commentss,commby,times,statuss) values('张三','好书，值得堆荐!!!','JavaScript高级编程','2018/10/10','已批准');

//创建articles表
  create table articles(
  id int not null auto_increment primary key,
  titles varchar(20) not null comment'标题',
  content varchar(100) not null comment'内容',
  author varchar(10) not null comment'作者',
  imgsrc varchar(10) not null comment'url',
  class varchar(10) not null comment'分类',
  times varchar(10) not null comment'发表时间',
  statuss varchar(5) not null comment'状态'
  )charset=utf8;


//向articles表插入数据
  insert into articles(titles,content,author,imgsrc,class,times,statuss) values('JS的数据类型','基本数据类型和引用数据类型','张三','c:/abc','技术知识','2018/10/10','发表');


  //创建categories表
  create table categories(
  id int not null auto_increment primary key,
  title varchar(20) not null comment'名称',
  alias varchar(50) not null comment'别名'

  )charset=utf8;

  //向categories表添加数据
  insert into categories(title,alias) values('未分类','Unclassified');
  insert into categories(title,alias) values('科技','science and technology');
  insert into categories(title,alias) values('知识分享','Knowledge sharing');
  insert into categories(title,alias) values('技术','technology');
  insert into categories(title,alias) values('知识产权','intellectual property right');

*/
