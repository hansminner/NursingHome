<?php if (!defined('THINK_PATH')) exit();?><div id="login_center">
    <?php if(isset($_SESSION['account'])): ?><div>
            <a href="<?php echo U('Login/index',['myspace']);?>">mySpace</a>
            <a href="javascript:void(0)" onclick="logout()" id="logout">Logout</a>
        </div>
        <?php else: ?>
        <div>
            <a href="<?php echo U('Login/index',['login']);?>">Login</a>/
            <a href="<?php echo U('Login/index',['signup']);?>">Signup</a>
        </div><?php endif; ?>
</div>
<script src="/NursingHome/Public/js/logout.js"></script>