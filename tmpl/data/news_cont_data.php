<?php
require('config.php');
$nid=$_REQUEST['nid'];
$sql="SELECT * FROM news WHERE nid='$nid'";
$result=mysqli_query($conn,$sql);
$output['data']=mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($output);