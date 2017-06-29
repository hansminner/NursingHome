<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28 0028
 * Time: 下午 4:59
 */

namespace Home\Controller;

<<<<<<< HEAD

=======
<<<<<<< HEAD
>>>>>>> 0e4283bd568626e7f5eedd8d711240957744a98d
use Home\Model\UserMgrModel;
use Think\Controller;
class LoginController extends Controller {
    public function index() {
<<<<<<< HEAD
        /*
         * todo
         * 这个页面应该单独出来*/

        $this->display();
    }

    /*
     *    login
     **/
    public function login() {
        header("charset=utf-8");
        if(IS_POST){
            $userName = I('post.userName');
            $pwd = I('post.password');
            $userMgr = new UserMgrModel();
            $res=$userMgr->login($userName, $pwd);
            echo $res['state'];

            if($res['state']==1){
                $account=array(
                  'id'=>'2',
                );

                $userState=session('account',$account);
                $this->redirect('Index/champion_list',$userState,5,'页面跳转中...');
            }else{
                return $res['msg'];
            }
        }
    }

=======
        
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
>>>>>>> 0e4283bd568626e7f5eedd8d711240957744a98d
}