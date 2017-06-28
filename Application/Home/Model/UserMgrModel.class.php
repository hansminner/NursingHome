<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28
 * Time: 23:40
 */

namespace Home\Model;


use Think\Model;

class UserMgrModel extends Model{
    /*
     * fdddddddddddd*/
    protected $tableName = 'user';
    public function login($account,$pwd) {
        $sql="select account,password from $this->tableName where account='$account'";
        $this->query($sql);
        dump($this->query($sql));


    }

}