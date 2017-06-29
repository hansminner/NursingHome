<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-3-13
 * Time: 下午6:49
 */

namespace Home\Model;
use Think\Model;


class DataMgrBaseModel {
    private $model = null;

    public function __construct(){
        $this->model = new Model();
    }

    protected function execute($sql) {
        $model = new Model();
        $result = $model->execute($sql);
        return $result;
    }

    protected function query($sql) {
        $model = new Model();
        $result = $model->query($sql);
        return $result;
    }

    protected function insert($sql){
        $model = new Model();
        $model->execute($sql);
        return $model->getLastInsID();
    }

    private function getLastInsertId(){
        $model = new Model();
        return $model ->getLastInsID();
    }
} 