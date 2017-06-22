<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>champion_list</title>
</head>
<body>
        <?php if(is_array($championData)): $i = 0; $__LIST__ = $championData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="champion_container" style="width: 200px;float: left">
                  <!--<a href="lolchart?id=<?php echo ($data["id"]); ?>">太复杂暂时不用-->
                  <a href="lolchart?id=<?php echo ($data["ename"]); ?>">
                      <img style="width: 80px;height: 80px" src="/NursingHome/Public\champions\<?php echo ($data["pic"]); ?>" alt="<?php echo ($data["ename"]); ?>">
                      <p style="margin: 0"><?php echo ($data["title"]); ?> <?php echo ($data["cname"]); ?></p>
                  </a>
              </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <link rel="stylesheet" type="text/css" href="/NursingHome/Public/css/champion.css">
        <script src="/NursingHome/Public/js/jquery-3.2.1.js"></script>
        <script type="text/javascript">

        </script>
</body>
</html>