<?php

namespace Home\Controller;


use Home\Model\UserMgrModel;
use Think\Controller;

class SignupController extends Controller {
    /*
     *    signup
     **/
    public function index(){
        if(IS_POST) {
            $userName = I('post.userName');
            $pwd = I('post.password');
            $userMgr = new UserMgrModel();
            $res = $userMgr->signup($userName, $pwd);
            if($res['state'] == 1) {
                $userState=session('account',$account);
               $this->redirect('Index/champion_list',$userState,5,'页面跳转中...');
            }else{
                return $res['msg'];
            }
        }
    }

}