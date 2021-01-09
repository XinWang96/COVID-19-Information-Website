<?php
if(!isset($_POST['visit']) || !isset($_POST['temperature']) || !isset($_POST['symptoms']) || !isset($_POST['contact'])) {
  echo '<script>alert("Please complete the form before submitting")</script>';
} else {
  $t1 = $_POST['visit'] == 'yes'? '1':'0';
  $t2 = $_POST['temperature'] == 'yes'? '1':'0';
  $t3 = $_POST['symptoms'] == 'yes'? '1':'0';
  $t4 = $_POST['contact'] == 'yes'? '1':'0';
  shell_exec('python -c "import project_back_end as pbe; tb = pbe.TableAccess();tb.insert_student_data('.$t1.','.$t2.','.$t3.','.$t4.')"');
  echo '<script>alert("Form submitted")</script>';
}
?>
