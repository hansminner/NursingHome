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
            <a class="navbar-brand" href="<?php echo U('Index/index');?>">英雄联盟</a>
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
                        <li><a href="<?php echo U('Index/champion_list');?>">英雄列表</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Index/item_list');?>">装备列表</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo U('Index/forum');?>">玩家论坛</a></li>
            </ul>
        </div>
        <div id="login_center" class="navbar-header navbar-right">
            <?php if(isset($_SESSION['account'])): ?><div>
                    <a href="<?php echo U('MySpace/index');?>">mySpace</a>
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

<link rel="stylesheet" href="/NursingHome/Public/css/top_bar.css">
<script type="text/javascript" src="/NursingHome/Public/js/logout.js"></script>

<!-- <link rel="stylesheet" href="/NursingHome/Public/css/bootstrap.css">
 <link rel="stylesheet" href="/NursingHome/Public/css/myspace.css">


 <script src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
 <script src="/NursingHome/Public/js/lib/bootstrap.js"></script>
 <script src="/NursingHome/Public/js/plugin/layer/layer.js"></script>
 <script src="/NursingHome/Public/js/home_common.js"></script>-->

</head>




    <div class="index-row">
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <?php if(is_array($carousel_list)): $i = 0; $__LIST__ = $carousel_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carousel_list): $mod = ($i % 2 );++$i;?><div class="item">
                        <img src="/NursingHome/Public/img/<?php echo ($carousel_list["path"]); ?>" alt="<?php echo ($carousel_list["path"]); ?> slide">
                        <div class="carousel-caption"><?php echo ($carousel_list["title"]); ?></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel"
               data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel"
               data-slide="next">&rsaquo;</a>
        </div>
        <!--轮播图边的热点新闻-->
        <div class="index-hotnews-ctn">
            <?php if(is_array($hotnews_list)): $i = 0; $__LIST__ = $hotnews_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><blockquote>
                    <a href="#"><h1 class="text-center"><?php echo ($vo["title"]); ?></h1></a>
                    <small class="pull-right"><?php echo ($vo["source"]); ?><cite title="Source Title"><?php echo ($vo["cite"]); ?></cite></small>
                </blockquote><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div style="width:1136px;height:90px;overflow:hidden;margin:16px auto">
    </div>
    <div class="column-row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    column
                </h3>
            </div>
            <div class="panel-body">
                <div class="index-column-trigger">
                    <ul class="column-nav nav nav-tabs nav-stacked" id="myTab">
                        <?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                <a href="#<?php echo ($vo["type_en"]); ?>" data-toggle="tab">
                                    <span><?php echo ($vo["type"]); ?></span>
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <li class="active">
                            <a href="#hot" data-toggle="tab">
                                <span>论坛最热</span>
                            </a>
                        </li>
                        <!--<li class="active">
                            <a href="#international" data-toggle="tab">
                                <span>国际局势</span>
                            </a>
                        </li>
                        <li>
                            <a href="#road-belt" data-toggle="tab">
                                <span>一带一路</span>
                            </a>
                        </li>
                        <li>
                            <a href="#cn-us" data-toggle="tab">
                                <span>中美关系</span>
                            </a>
                        </li>
                        <li>
                            <a href="#peripheral" data-toggle="tab">
                                <span>周边关系</span>
                            </a>
                        </li>
                        <li>
                            <a href="#cn-eu" data-toggle="tab">
                                <span>中欧关系</span>
                            </a>
                        </li>
                        <li>
                            <a href="#hot" data-toggle="tab">
                                <span>论坛最热</span>
                            </a>
                        </li>-->
                    </ul>
                </div>
                <div class="index-column-content tab-content">
                    <?php if(is_array($news_list)): foreach($news_list as $k=>$value): ?><div class="paper_item tab-pane" id="<?php echo ($k); ?>">
                            <?php if(is_array($value)): foreach($value as $key=>$vo): ?><div class="item-list">
                                    <h5><?php echo ($vo["title"]); ?></h5>
                                    <h5><?php echo ($vo["cite"]); ?></h5>
                                    <div>
                                        <?php echo ($vo["summary"]); ?>
                                    </div>
                                </div><?php endforeach; endif; ?>
                        </div><?php endforeach; endif; ?>
                    <div class="paper_item tab-pane" id="hot">
                        <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><div class="item-list">
                                <?php if($vo['type'] == 1): ?><h5><?php echo ($vo2["title"]); ?></h5>
                                    <h5><?php echo ($vo2['type']); ?></h5>
                                    <div>
                                        <?php echo ($vo2["summary"]); ?>
                                    </div><?php endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="index-bigCream" style="height:auto;"></div>
    <div class="video-row"></div>


<link rel="stylesheet" href="/NursingHome/Public/css/Common/home_base.css">
<script type="text/javascript" src="/NursingHome/Public/js/logout.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/jquery.validate.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/messages_zh.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/bootstrap.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/layer/layer.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/home_common.js"></script>


    <script src="/NursingHome/Public/js/index.js"></script>



    <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/index.css">

</body>