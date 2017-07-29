<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">后台管理</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        编辑
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">轮播图</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('News/edit_index');?>" >首页编辑</a></li>
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
                    <a href="javascript:void(0)" onclick="login()">Login</a>
                    <a href="javascript:void(0)" onclick="login()">Signup</a>
                </div><?php endif; ?>
        </div>
    </div>
</nav>
<script src="/NursingHome/Public/js/logout.js"></script>



    <p>首页编辑</p>
    <form action="<?php echo U('edit_index');?>" method="post">
        <div class="index-row">
            <div class="index-hotnews-ctn">
                <p>头条新闻编辑</p>
                <volist>
                    <li>
                        <label for="">头条新闻标题:</label><input type="text" value="<?php echo ($vo["title"]); ?>">
                    </li>
                    <li>
                        <label for="">新闻来源描述:</label><input type="text" value="someone famous in">
                    </li>
                    <li>
                        <label for="">头条新闻来源:</label><input type="text" value="<?php echo ($vo["cite"]); ?>">
                    </li>
                    <li>
                        <!--<button type="submit" value="">编辑</button>-->
                        <button type="submit" value="">取消首页显示</button>
                    </li>
                </volist>
            </div>
        </div>
    </form>

    <!--<div class="column-row">
        <div class="panel">
            <p>panel-heading</p>
            <li>
                <label for="">论坛名称:</label><input type="text" value="<?php echo ($vo["cite"]); ?>">
            </li>
            <p>panel-body</p>
            <p>&#45;&#45;index-column-trigger</p>
            <li>
                <label for="">tab 名:</label><input type="text" value="<?php echo ($vo["cite"]); ?>">
            </li>
            <p>&#45;&#45;index-column-content</p>
            <volist>
                <li>
                    <label for="">tab内容:</label><input type="text" value="<?php echo ($vo["cite"]); ?>">
                </li>
            </volist>
        </div>
    </div>-->



<link rel="stylesheet" href="/NursingHome/Public/css/Common/admin_base.css">
<script type="text/javascript" src="/NursingHome/Public/js/logout.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/bootstrap.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/layer/layer.js"></script>




</body>