<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/bootstrap.css">
</head>
<body>

<html>
<head>
    <meta charset="UTF-8">
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




    <div class="myspace_container">
        <div class="myspace">
            <div class="myspace_left">
                <div class="account-container">
                    <div class="account-avatar thumbnail">
                        <img src="/NursingHome/Public/img/headshot.jpg" alt="">
                    </div> <!-- /account-avatar -->
                    <div class="account-details">
                        <span class="account-name">Rod Howard</span>
                        <span class="account-role">Administrator</span>
                        <span class="account-actions">
							<a href="javascript:;">Profile</a> |
							<a href="javascript:;">Edit Settings</a>
						</span>
                    </div> <!-- /account-details -->
                </div> <!-- /account-container -->
                <hr>
                <ul id="main-nav" class="nav nav-tabs nav-stacked">

                    <li>
                        <a href="./">
                            <i class="icon-home"></i>
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="./">
                            <!--<a href="./faq.html">-->
                            <i class="icon-pushpin"></i>
                            FAQ
                        </a>
                    </li>

                    <li>
                        <a href="./">
                            <!--<a href="./plans.html">-->
                            <i class="icon-th-list"></i>
                            Pricing Plans
                        </a>
                    </li>

                    <li>
                        <a href="./">
                            <!--<a href="./grid.html">-->
                            <i class="icon-th-large"></i>
                            Grid Layout
                            <span class="label label-warning pull-right">5</span>
                        </a>
                    </li>

                    <li>
                        <a href="./">
                            <!--<a href="./charts.html">-->
                            <i class="icon-signal"></i>
                            Charts
                        </a>
                    </li>

                    <li>
                        <a href="./">
                            <!-- <a href="./account.html">-->
                            <i class="icon-user"></i>
                            User Account
                        </a>
                    </li>

                    <li>
                        <a href="./">
                            <!--<a href="./login.html">-->
                            <i class="icon-lock"></i>
                            Login
                        </a>
                    </li>

                </ul>


                <hr>

                <div class="sidebar-extra">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                </div> <!-- .sidebar-extra -->

                <br>

            </div> <!-- /span3 -->
            <div class="myspace_main">

                <h1 class="page-title">
                    <i class="icon-th-list"></i>
                    Pricing Plans
                </h1>


                <div class="widget">

                    <div class="widget-header">
                        <h3>Available Plans</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <div class="pricing-plans plans-3">

                            <div class="plan-container">
                                <div class="plan">
                                    <div class="plan-header">

                                        <div class="plan-title">
                                            Micro
                                        </div> <!-- /plan-title -->

                                        <div class="plan-price">
                                            <span class="note">$</span>15<span class="term">Per Month</span>
                                        </div> <!-- /plan-price -->

                                    </div> <!-- /plan-header -->

                                    <div class="plan-features">
                                        <ul>
                                            <li><strong>Free</strong> setup</li>
                                            <li><strong>1</strong> Website</li>
                                            <li><strong>2</strong> Projects</li>
                                            <li><strong>1GB</strong> Storage</li>
                                            <li><strong>$0</strong> Google Adwords Credit</li>
                                        </ul>
                                    </div> <!-- /plan-features -->

                                    <div class="plan-actions">
                                        <a href="javascript:;" class="btn">Purchase Now</a>
                                    </div> <!-- /plan-actions -->

                                </div> <!-- /plan -->
                            </div> <!-- /plan-container -->

                            <div class="plan-container">
                                <div class="plan">
                                    <div class="plan-header">

                                        <div class="plan-title">
                                            Starter
                                        </div> <!-- /plan-title -->

                                        <div class="plan-price">
                                            <span class="note">$</span>35<span class="term">Per Month</span>
                                        </div> <!-- /plan-price -->

                                    </div> <!-- /plan-header -->

                                    <div class="plan-features">
                                        <ul>
                                            <li><strong>Free</strong> setup</li>
                                            <li><strong>5</strong> Website</li>
                                            <li><strong>10</strong> Projects</li>
                                            <li><strong>5GB</strong> Storage</li>
                                            <li><strong>$25</strong> Google Adwords Credit</li>
                                        </ul>
                                    </div> <!-- /plan-features -->

                                    <div class="plan-actions">
                                        <a href="javascript:;" class="btn">Purchase Now</a>
                                    </div> <!-- /plan-actions -->

                                </div> <!-- /plan -->
                            </div> <!-- /plan-container -->

                            <div class="plan-container">
                                <div class="plan orange">
                                    <div class="plan-header">

                                        <div class="plan-title">
                                            Business
                                        </div> <!-- /plan-title -->

                                        <div class="plan-price">
                                            <span class="note">$</span>75<span class="term">Per Month</span>
                                        </div> <!-- /plan-price -->

                                    </div> <!-- /plan-header -->

                                    <div class="plan-features">
                                        <ul>
                                            <li><strong>Free</strong> setup</li>
                                            <li><strong>20</strong> Website</li>
                                            <li><strong>35</strong> Projects</li>
                                            <li><strong>Unlimited</strong> Storage</li>
                                            <li><strong>$65</strong> Google Adwords Credit</li>
                                        </ul>
                                    </div> <!-- /plan-features -->

                                    <div class="plan-actions">
                                        <a href="javascript:;" class="btn">Purchase Now</a>
                                    </div> <!-- /plan-actions -->

                                </div> <!-- /plan -->
                            </div> <!-- /plan-container -->


                        </div> <!-- /pricing-plans -->

                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->


                <div class="widget">

                    <div class="widget-header">
                        <h3>Account Information</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->
            </div> <!-- /span9 -->
        </div> <!-- /row -->
    </div>


<script type="text/javascript" src="/NursingHome/Public/js/logout.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/bootstrap.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/plugin/layer/layer.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/home_common.js"></script>


    <script src="/NursingHome/Public/js/myspace.js"></script>



    <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/myspace.css">

</body>