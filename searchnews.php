<?php
session_start();
$sorganization = htmlspecialchars($_REQUEST['delete_name']);
/*$sorganization ="10TV";*/
$conn=mysqli_connect('database-1.clp96k52ns15.us-east-2.rds.amazonaws.com','admin','TOpbYAdbuzlWDpC7gidy','Project');
$sql="select title,news_link,out_date,organizations from Project.NewsData where organizations='$sorganization'"; //从数据库中查询昵称
mysqli_set_charset($conn,'utf8mb4');
$res=mysqli_query($conn,$sql);
$dataarray=array();
$i=0;
while($rows=mysqli_fetch_array($res)){  //遍历数据库
  array_push($dataarray,$rows);

}

$data=json_encode($dataarray); //json编码解析
echo $data;

mysqli_close($conn);


file_put_contents("result.json",$data);
