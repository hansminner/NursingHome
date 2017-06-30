<?php

namespace Home\Controller;


use Think\Controller;
use Home\Model\UserMgrModel;

class LoginController extends Controller {
    public function index(){
        /*
         * todo
         * 这个页面应该单独出来*/
        $this->display();
    }

    /*
     *    login
     **/
    public function login(){
        header("Content-Type:text/html; charset=utf-8");
        dump($_SESSION);
        if(IS_POST) {
            $userName = I('post.userName');
            $pwd = I('post.password');
            $userMgr = new UserMgrModel();
            $res = $userMgr->login($userName, $pwd);
            if($res['state'] == 1) {
                $account = array(
                    'user_name' => $userName,
                );
                $userState = session('account', $account);
                $this->redirect('Index/champion_list', $userState, 2, '页面跳转中...');
            } else {
                echo '帐号密码错误';
                return $res['msg'];
            }
        }
    }
    /*
     * logout
     * */
    public function logout(){
        session('account',null);
        $this->ajaxReturn('您已经退出登录');
    }
}
