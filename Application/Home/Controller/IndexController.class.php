<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\ChampionModel;
use Utils\ConstantUtils;


//class IndexController extends ChampionBaseController {
class IndexController extends Controller {
    //public static $championDetailArr=json_decode($daiwan->curl($apiUrl),true)['data'];
    //$_SESSION['']= $mybasket;
    public function index(){
        /*轮播图*/
        $model = M('index_carousel');
        $carousel_list = $model->select();
        $this->assign('carousel_list', $carousel_list);

        /*头条新闻*/
        $newsModel = M('news');
        $condition=array(
            'is_hot'=>'1',
        );
        $hotnews_list=$newsModel->where($condition)->field('title,source,cite')->order(array('created_date'=>'desc'))->limit(4)->select();
        $this->assign('hotnews_list',$hotnews_list);

        /*tab新闻显示*/
        $news_list = $newsModel->field('id,title,summary,priority,type,source,cite')->order(array('type', 'priority' => 'desc'))->select();
        $typeModel = M('news_type');
        $type_list=$typeModel->field('type_en,type')->select();
        $this->assign('type_list',$type_list);
        foreach ($news_list as $key => $value) {
            $condition = array(
                'type_id' => $value['type']
            );
            $tabId = $typeModel->where($condition)->getField('type_en');
            $news_list[$key]['type_en'] = $tabId;
        }
        $arr = array();
        foreach ($news_list as $item) {
            for($i=1;$i<4;$i++){
                $arr[$item['type_en']][$i] = $item;
            }
        }
        //dump($news_list);
        $this->assign('news_list', $arr);

        $this->display();
    }

    public function champion_list(){
        dump($_SESSION);
        $model = new ChampionModel();
        $championData = $model->getList();
        $this->assign('championData', $championData);
        $this->display();
    }

    public function lol_chart($id){
        dump($_SESSION);
        $this->assign('id', $id);
        $this->display();
    }

    public function championInfo(){
        $id = I('get.id');
        $model = new ChampionModel();
        $championInfo = $model->getchampionInfo($id);
        $this->ajaxReturn($championInfo['0']);
    }

    public function insertData(){
        $daiwan = new \Org\Util\Daiwan("94D41-E6999-14294-4C624");
        $apiUrl = $daiwan->getMethod("Champion");
        $daiwan->curl($apiUrl);
        $championDataArr = json_decode($daiwan->curl($apiUrl), true)['data'];
        $model = new ChampionModel();
        $res = $model->insertChampionData($championDataArr);
        dump($res['msg']);
    }

    public function insertDetail(){
        $model = new ChampionModel();
        $championData = $model->getList();
        foreach ($championData as $value) {
            $championId = $value['id'];
            $daiwan = new \Org\Util\Daiwan("94D41-E6999-14294-4C624");
            $apiUrl = $daiwan->getMethod("GetChampionDetail", $championId);
            $championDetailArr = json_decode($daiwan->curl($apiUrl), true)['data'];
            $res = $model->insertChampInfo($championDetailArr);
        }
        dump($res['msg']);
    }


    public function boot(){
        $this->display();
    }

    public function chart(){
        $this->display();
    }

    public function chart01(){
        $this->display();
    }

    public function chart02(){
        $this->display();
    }

}