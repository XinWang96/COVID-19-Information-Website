<?php


session_start();
$uid = htmlspecialchars($_REQUEST['name']);
$upsw = htmlspecialchars($_REQUEST['password']);

$conn=mysqli_connect('database-1.clp96k52ns15.us-east-2.rds.amazonaws.com','admin','TOpbYAdbuzlWDpC7gidy','Project');
$sql="select username,authority from Project.Users where username='$uid' and psw='$upsw'";
mysqli_set_charset($conn,'utf8mb4');
$res=mysqli_query($conn,$sql);
$dataarray=array();
if($rows=mysqli_fetch_assoc($res)){
  array_push($dataarray,$rows);
}

$data=json_encode($dataarray);

mysqli_close($conn);

$strArr=explode('"',$data);
echo($strArr[7]);
file_put_contents("authority.json",$data);

?>
