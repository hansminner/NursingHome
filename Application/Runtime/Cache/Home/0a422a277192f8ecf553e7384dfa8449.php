<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>champion_list</title>
</head>

<body>

<!--<div><a href="<?php echo U('Login/index');?>">Login</a>/<a href="">Signup</a></div>-->
<div>
    <a href="<?php echo U('Login/index',['login']);?>">Login</a>/
    <a href="<?php echo U('Login/index',['signup']);?>">Signup</a>
</div>
<div class="content">
    <!---->
    <?php if(is_array($championData)): $i = 0; $__LIST__ = $championData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="champion_container">
            <!--<a href="lolchart?id=<?php echo ($data["id"]); ?>">太复杂暂时不用-->
            <a href="lol_chart?id=<?php echo ($data["ename"]); ?>">
                <img src="/NursingHome/Public\champions\<?php echo ($data["pic"]); ?>" alt="<?php echo ($data["ename"]); ?>">
                <p><?php echo ($data["title"]); ?> <?php echo ($data["cname"]); ?></p>
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/champion.css">
<script src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script type="text/javascript">

</script>
</body>
</html>