<?php
/**
 * Created by PhpStorm.
 * User: linzq
 * Date: 2017/7/4
 * Time: 15:16
 */

namespace Admin\Controller;


use Think\Controller;

class DemoController extends Controller
{

    public function curdTest()
    {
        $model = M('test');

        //根据条件查找，返回数据集
        $name = "test_user";
        $condition = array(
            'name' => $name
        );
        $model->where($condition)->select();

        // 通过主键查找记录，返回一条记录
        $id = 12;
        $model->find($id);

        // 区间查找：where id in (12, 14)
        $condition = array(
            'id'  => array("IN", "12, 14")
        );
        $model->where($condition)->select();

        //取出某一条记录的某个字段的值
        $condition = array(
            'id' => 13
        );
        $model->where($condition)->getField("name");
    }
}