<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录/注册</title>
    <link rel="stylesheet" href="/NursingHome/Public/css/login.css">
    <link rel="stylesheet" href="/NursingHome/Public/css/bootstrap.css">
    <script src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
</head>
<body>
<div class="login-container">
    <div class="btn-group btn-group-lg btn-group-justified">
        <div class="btn-group">
            <button type="button" class="btn btn-default" id="login-switch-btn">登录</button>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-default" id="sign-switch-btn">注册</button>
        </div>
    </div>
    <div class="login-container-content cur" >
        <form action="<?php echo U('Login/login');?>" role="form" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="userName" aria-label="手机号或邮箱" placeholder="手机号或邮箱"
                       required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" aria-label="密码" placeholder="密码" required/>
            </div>
            <button class="btn btn-default btn-lg btn-block" type="submit">登录</button>
        </form>
    </div>
    <div class="signup-container-content">
        <form action="<?php echo U('Home/Signup/index');?>" role="form" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="userName" aria-label="手机号或邮箱" placeholder="手机号或邮箱"
                       required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" aria-label="密码" placeholder="密码" required/>
                <!--<button type="button" class="send-code-button">获取验证码</button>-->
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="repassword" aria-label="密码" placeholder="再次输入密码"
                       required/>
            </div>
            <button class="btn btn-default btn-lg btn-block" type="submit" onclick="validate()">注册</button>
        </form>
    </div>
</div>
<script src="/NursingHome/Public/js/login.js"></script>

</body>
</html>