<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
</head>
<body>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">英雄联盟</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            新闻资讯
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">游戏资讯</a></li>
                            <li class="divider"></li>
                            <li><a href="#">LPL赛区</a></li>
                            <li class="divider"></li>
                            <li><a href="#">LCK赛区</a></li>
                            <li class="divider"></li>
                            <li><a href="#">其他赛区</a></li>
                            <li class="divider"></li>
                            <li><a href="#">路人/主播</a></li>
                        </ul>
                    </li>
                    <!--选中效果添加 class="active"-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">游戏资料
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">英雄列表</a></li>
                            <li class="divider"></li>
                            <li><a href="#">装备列表</a></li>
                        </ul>
                    </li>

                    <li><a href="#">玩家论坛</a></li>
                </ul>
            </div>
            <div id="login_center" class="navbar-header navbar-right">
                <?php if(isset($_SESSION['account'])): ?><div>
                        <a href="<?php echo U('Login/index',['myspace']);?>">mySpace</a>
                        <a href="javascript:void(0)" onclick="logout()" id="logout">Logout</a>
                    </div>
                    <?php else: ?>
                    <div id="login_center_no">
                        <!--<a href="javascript:void(0)" onclick="login()">Login</a>
                        <a href="javascript:void(0)" onclick="login()">Signup</a>-->
                        <a href="<?php echo U('Login/index',['login']);?>">Login</a>
                        <a href="<?php echo U('Login/index',['signup']);?>">Signup</a>
                    </div><?php endif; ?>
            </div>
        </div>
    </nav>
    <link rel="stylesheet" href="/NursingHome/Public/css/bootstrap.css">
    <script src="/NursingHome/Public/js/logout.js"></script>
    <script src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
    <script src="/NursingHome/Public/js/lib/bootstrap.js"></script>
    <script src="/NursingHome/Public/js/plugin/layer/layer.js"></script>
    <script src="/NursingHome/Public/js/home_common.js"></script>