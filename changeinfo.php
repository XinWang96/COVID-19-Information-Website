<?php
$t1 = $_POST['npw'];
/*$t2 = $_POST['oldpw'];*/
$t3 = $_POST['newpw'];

if ($t1==''||$t3==''||$t1!=$t3) {
  echo '<script>alert("invaild input")</script>';
} else {
  if ($t3) {
    $result = shell_exec('python -c "import project_back_end as pbe; tb = pbe.TableAccess();tb.changing('."'".$t1."'".","."'".$t3."'".')"');
    /*    shell_exec('python -c "import project_back_end as pbe; tb = pbe.TableAccess();tb.changeinfo('."'".$t2."'".')"');*/
    echo '<script>alert("change successful")</script>';
  } else {
    echo '<script>alert("change fail")</script>';
  }
}
?>
