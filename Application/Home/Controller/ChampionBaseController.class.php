<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\ChampionModel;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/28 0028
 * Time: 上午 10:45
 */
class ChampionBaseController extends Controller {
    public function champion_list() {
        $model = new ChampionModel();
        $championData = $model->getList();
        $this->assign('championData', $championData);
        $this->display();
    }
}