<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\ChampionModel;
use Utils\ConstantUtils;

class IndexController extends Controller {
    //public static $championDetailArr=json_decode($daiwan->curl($apiUrl),true)['data'];
    //$_SESSION['']= $mybasket;
    public function index() {
        $number = 'hgghg';
        //$number= date('y-m-d,h-m-s',time());

        $title = I('get.title', $number);

        dump(I('get.title'));
        dump($title);
        //dump($number);
        dump(isset($number));
        dump(empty($number));
        $Test = M('Test');
        $list = $Test->select();
        $this->assign('list', $list);
        $this->display();
    }

    public function boot() {
        $this->display();
    }

    public function chart() {
        $this->display();
    }

    public function chart01() {
        $this->display();
    }

    public function chart02() {
        $this->display();
    }


    public function champion_list() {
        $model = new ChampionModel();
        $championData = $model->getList();
        $this->assign('championData', $championData);
        $this->display();
    }

    public function lol_chart($id) {
        $this->assign('id', $id);
        $this->display();
    }

    public function championInfo() {
        $id = I('get.id');
        $model = new ChampionModel();
        $championInfo = $model->getchampionInfo($id);
        $this->ajaxReturn($championInfo['0']);
    }

    public function insertData() {
        $daiwan = new \Org\Util\Daiwan("CA8DE-CCD89-4EDDD-A4B8B");
        $apiUrl = $daiwan->getMethod("Champion");
        $daiwan->curl($apiUrl);
        $championDataArr = json_decode($daiwan->curl($apiUrl), true)['data'];
        $model = new ChampionModel();
        $res = $model->insertChampionData($championDataArr);
        dump($res['msg']);
    }

    public function insertDetail() {
        $model = new ChampionModel();
        $championData = $model->getList();
        foreach ($championData as $value) {
            $championId = $value['id'];
            $daiwan = new \Org\Util\Daiwan("CA8DE-CCD89-4EDDD-A4B8B");
            $apiUrl = $daiwan->getMethod("GetChampionDetail", $championId);
            $championDetailArr = json_decode($daiwan->curl($apiUrl), true)['data'];
            $res = $model->insertChampInfo($championDetailArr);
        }
        dump($res['msg']);
    }


}