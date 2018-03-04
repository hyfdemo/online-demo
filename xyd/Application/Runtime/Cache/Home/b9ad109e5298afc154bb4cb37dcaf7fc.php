<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学校微信公众号后台管理</title>
</head>
<body>
<div>
    <form action="./results_excel" enctype="multipart/form-data"method="post" >
    <input type="file"name="photo" />
    <input type="text" name="semester" value="">
    <input type="submit"value="导入数据"style="background-color: #337AB7;color: white;">
    </form>
</div>
</body>
</html>