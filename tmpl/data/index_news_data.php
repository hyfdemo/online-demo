<?php
    require('config.php');
      $sql = "SELECT * FROM news";
      $result = mysqli_query($conn,$sql);
      $output=[];
      while(($list = mysqli_fetch_assoc($result))!==null){
        $output[] = $list;
      }
      echo json_encode($output);
?>