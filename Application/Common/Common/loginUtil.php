<?php
/**
 * Created by PhpStorm.
 * User: linzq
 * Date: 2017/6/21
 * Time: 11:30
 */
function get_uname(){
    $uid = get_uid();
    if($uid && is_numeric($uid)){ //获取当前登录用户名
        return session('user_auth.name');
    }

    return "";
}

function get_uid(){
    $user = session('user_auth');
    return $user['uid'];
}

function data_auth_sign($data) {
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data);
    $code = http_build_query($data);
    $sign = sha1($code);
    return $sign;
}

function storageUserInfo($userInfo){
    $auth = array(
        'uid'              => $userInfo['id'],
        'role'             => $userInfo['role'],
        'tel'              => $userInfo['tel'],
        'name'             => $userInfo['name'],
        'last_login_time' => $userInfo['last_login_time']
    );
    session('user_auth', $auth);
    session('user_auth_sign', data_auth_sign($auth));
    return true;
}

function logout(){
    session('user_auth', null);
    session('user_auth_sign', null);
}

