<?php
session_start();
$deleteuser = htmlspecialchars($_REQUEST['delete_name']);
$conn=mysqli_connect('database-1.clp96k52ns15.us-east-2.rds.amazonaws.com','admin','TOpbYAdbuzlWDpC7gidy','Project');
$sql="update Project.Users set authority = 'administrator'where username='$deleteuser'"; //从数据库中查询昵称
mysqli_set_charset($conn,'utf8mb4');
$res=mysqli_query($conn,$sql);

$sql="select username,authority from Project.Users";
mysqli_set_charset($conn,'utf8mb4');
$res=mysqli_query($conn,$sql);
$dataarray=array();

while($rows=mysqli_fetch_array($res)){  //遍历数据库
  array_push($dataarray,$rows);

}

$data=json_encode($dataarray); //json编码解析
echo $data;

mysqli_close($conn);


file_put_contents("user.json",$data);
