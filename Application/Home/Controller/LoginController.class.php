<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28 0028
 * Time: 下午 4:59
 */

namespace Home\Controller;


use Home\Model\UserMgrModel;
use Think\Controller;
class LoginController extends Controller {
    public function index() {
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

}