<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="/NursingHome/Public/css/login.css">
    <link rel="stylesheet" href="/NursingHome/Public/css/bootstrap.css">

</head>
<body>
<div class="login-container">
    <form action="<?php echo U('Login/login');?>" role="form" method="post">
        <div class="form-group">
            <input class="form-control" type="text" name="account" aria-label="手机号或邮箱" placeholder="手机号或邮箱" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" aria-label="密码" placeholder="密码" required/>
            <!--<button type="button" class="send-code-button">获取验证码</button>-->
        </div>
        <button class="btn btn-default btn-lg btn-block" type="submit">登录</button>
    </form>
</div>
</body>
</html>