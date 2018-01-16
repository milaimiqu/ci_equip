<!doctype html>
<html lang="zh-cn">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resource/css/main.css">

        <link src="<?php echo base_url();?>resource/js/jquery.min.js">
        <link src="<?php echo base_url();?>resource/js/bootstrap.min.js">

        <title>设备管理系统</title>

        </head>

        <body class="index_body">

        <div class="container">
            <h1 class="logo-index"><img class="logo-index" src="<?php echo base_url();?>resource/pic/logo.png" alt="logo" width="300"></h1>

            <form class="form-signin" role="form" name="form1" method="post" action="index.php/login/login">
              <h2 class="form-signin-heading">总装科设备管理系统</h2>
              <input type="text" class="form-control" name="user" id="user" placeholder="账号" required autofocus>
              <input type="password" class="form-control" name="pwd" id="pwd" placeholder="密码" required>
              <button class="btn btn-lg btn-primary btn-block bottom" type="submit" name="enter" id="enter">登陆</button>
            </form>

        </div>
        </body>
</html>