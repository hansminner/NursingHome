<?php

namespace Home\Model;

class UserMgrModel extends DataMgrBaseModel {
    /*
     * fdddddddddddd*/
    public function login($userName, $pwd){
        $sql = "select password from user where user_name='$userName'";
        dump($userName);dump($pwd);
        $date_pwd_arr = $this->query($sql);
        $date_pwd=$date_pwd_arr['0']['password'];
        dump($date_pwd);
        if($pwd == $date_pwd) {
            /*$sql = "select user_name,password from user where user_name='$userName'";
            $this->query($sql);*/
            return array(
                'state' => 1,
                'msg' => '用户名',
            );
        } else {
            return array(
                'state' => 0,
                'msg' => '用户名或密码错误',
            );
        }
    }

    public function signup($userName, $pwd){
        $sql = "select uid from user where user_name='$userName'";
        if(empty($this->query($sql))) {
            $sql = "insert into user(user_name,password) VALUES ('$userName','$pwd')";
            $this->execute($sql);
            return array(
                'state' => 1,
                'msg' => '用户名',
            );
        } else {
            return array(
                'state' => 0,
                'msg' => '该用户名已被注册',
            );
        }

    }

}