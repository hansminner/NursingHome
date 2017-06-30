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
        header("charset=utf-8");
        if(IS_POST) {
            $userName = I('post.userName');
            $pwd = I('post.password');
            $userMgr = new UserMgrModel();
            $res = $userMgr->login($userName, $pwd);
            echo $res['state'];

            if($res['state'] == 1) {
                $account = array(
                    'id' => '2',
                );
                $userState = session('account', $account);
                $this->redirect('Index/champion_list', $userState, 5, '页面跳转中...');
            } else {
                return $res['msg'];
            }
        }
    }


}
