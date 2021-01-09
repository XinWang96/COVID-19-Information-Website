<?php
$t1 = htmlspecialchars($_REQUEST['new_username']);
$t2 = htmlspecialchars($_REQUEST['new_password']);
$a = shell_exec('python -c "import project_back_end as pbe; tb = pbe.TableAccess();tb.get_username('."'".$t1."'".')"');
echo $a;
if (strcmp(trim($a), "()") != 0) {
  echo '<script>alert("Username exists, please enter another one")</script>';
} else {
  if ($t2) {
    if($t1=='faculty'||$t1=='administrator')
    {
      echo '<script>alert("Please input the new username again!")</script>';
    }
    else
    {
      session_start();
      $conn=mysqli_connect('database-1.clp96k52ns15.us-east-2.rds.amazonaws.com','admin','TOpbYAdbuzlWDpC7gidy','Project');
      $sql="insert into Project.Users(username, psw,authority) values('".$t1."','".$t2."','faculty')";
      mysqli_set_charset($conn,'utf8mb4');
      $res=mysqli_query($conn,$sql);

      $sql="select username,authority from Project.Users";
      mysqli_set_charset($conn,'utf8mb4');
      $res=mysqli_query($conn,$sql);
      $dataarray=array();

      while($rows=mysqli_fetch_array($res)){
        array_push($dataarray,$rows);

      }

      $data=json_encode($dataarray);
      echo $data;

      mysqli_close($conn);


      file_put_contents("user.json",$data);
      echo '<script>alert("Account Created")</script>';
    }

  } else {
    echo '<script>alert("Please enter a valid password")</script>';
  }
}
?>
