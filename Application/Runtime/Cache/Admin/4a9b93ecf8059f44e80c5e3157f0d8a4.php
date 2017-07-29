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
            <caption>新闻编辑</caption>
            <!--table bar-->
            <div class="table_bar">
                <a class="a_style_button" href="<?php echo U('News/add_news');?>">编写新闻</a>
                <!--<div class="search_box_container">
                    <div class="search_box">
                        <form action="/0711/admin.php/Game/strategy" method="get">
                            <input type="text" placeholder="请输入文章标题或小编昵称" name="title">
                            <button type="submit">搜索</button>
                        </form>

                    </div>
                </div>-->
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <td>题目</td>
                    <!--<td>内容</td>-->
                    <td style="width: 340px">概要</td>
                    <td>关键词</td>
                    <td>source</td>
                    <td>cite</td>
                    <td>类型</td>
                    <td>是否热门</td>
                    <td>优先级</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["title"]); ?></td>
                       <!-- <td><?php echo ($vo["content"]); ?></td>-->
                        <td><?php echo ($vo["summary"]); ?></td>
                        <td><?php echo ($vo["key_words"]); ?></td>
                        <td><?php echo ($vo["source"]); ?></td>
                        <td><?php echo ($vo["cite"]); ?></td>
                        <td><?php echo ($vo["type_text"]); ?></td>
                        <td><?php echo ($vo["is_hot"]); ?></td>
                        <td><?php echo ($vo["priority"]); ?></td>
                        <td>
                            <a href="<?php echo U('News/edit_news?id='.$vo['id']);?>">编辑</a>
                            <a href="<?php echo U('News/edit_news?id='.$vo['id']);?>">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
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
                alert(res);
            });
        }
    </script>



</body>