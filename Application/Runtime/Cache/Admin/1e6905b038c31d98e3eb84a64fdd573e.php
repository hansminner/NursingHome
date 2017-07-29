<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                        <li><a href="<?php echo U('News/edit_index_news');?>" >头条新闻编辑</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('News/news_list');?>">新闻编辑</a></li>
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
    <div class="index-row">
        <div class="index-hotnews-ctn">
            <p>头条新闻编辑</p>
            <form action="" role="form" class="form-horizontal">
                <?php if(is_array($hotnews_list)): $i = 0; $__LIST__ = $hotnews_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="<?php echo ($vo["id"]); ?>">
                        <div class="form-group">
                            <label for="title" class="control-label col-sm-2">头条新闻标题:</label>
                            <div class="col-sm-10">
                                <input id="title" type="text" value="<?php echo ($vo["title"]); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="source" class="control-label col-sm-2">新闻来源描述:</label>
                            <div class="col-sm-10">
                                <input id="source" type="text" value="someone famous in" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cite" class="control-label col-sm-2">头条新闻来源:</label>
                            <div class="col-sm-10">
                                <input id="cite" type="text" value="<?php echo ($vo["cite"]); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="javascript:void(0)" onclick="news_hide(<?php echo ($vo["id"]); ?>)">取消首页显示</a>
                            </div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </form>
        </div>
    </div>


<link rel="stylesheet" href="/NursingHome/Public/css/Common/admin_base.css">

<script type="text/javascript" src="/NursingHome/Public/js/logout.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/jquery.validate.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/messages_zh.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/bootstrap.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/layer/layer.js"></script>


    <script type="text/javascript">
        $(function () {

        });
        function news_hide(id) {
            $.post('Admin/News/edit_index_news', {id: id}, function (res) {
                $('#' + id).remove();
                alert(res);
            });
        }
    </script>



</body>