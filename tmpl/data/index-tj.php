<?php
  require('config.php');
  $uname = $_REQUEST['uname'];
  $uphone = $_REQUEST['uphone'];
  $ucont = $_REQUEST['ucont'];
  $sql = "INSERT INTO xf_input VALUES
      (NULL,'$uname','$uphone','$ucont')";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_insert_id($conn);
  echo $row;
