$(document).ready(function () {
    //如果有多个采用for循环遍历，上下一一对应
    $('#login-switch-btn').click(function () {
        /*$('.signup-container-content').css("display","none");
         $('.login-container-content').css("display","block");*/
        $(".cur").removeClass("cur");
        $('.login-container-content').addClass("cur");
    });
    $('#sign-switch-btn').click(function () {
        /*$('.login-container-content').css("display","none");
         $('.signup-container-content').css("display","block");*/
        $(".cur").removeClass("cur");
        $('.signup-container-content').addClass("cur");
    });

    /*todo
     * 登录前的验证
     * */
    function verify() {

    }
    /*todo
    * 完成帐号是否存在，两次密码输入是否一致
    * */
    function validate() {
        
    }
    /*
    * todo
    * 表单的ajax提交
    * */
    $.ajax(function () {
        
    });
});
