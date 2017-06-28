<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28 0028
 * Time: 下午 4:59
 */

namespace Home\Controller;

<<<<<<< HEAD
use Home\Model\UserMgrModel;
use Think\Controller;
class LoginController extends Controller{
    public function index() {
        
        $this->display();
    }
/*
 *    login
 **/
    public function login() {
        $account=I('post.account');
        $pwd=I('post.password');
        $userMgr = new UserMgrModel();
        $userMgr->login($account,$pwd);
       
    }
=======
use Think\Controller;
class LoginController extends Controller{
    public function index() {
        $this->display();
    }
>>>>>>> 9f8cc18014220955071ac1b346284b5691c885ab
}