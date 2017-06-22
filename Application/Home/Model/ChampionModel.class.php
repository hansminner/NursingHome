<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/21 0021
 * Time: 10:27
 */

namespace Home\Model;


use Think\Model;

class ChampionModel extends Model {
    public function getList() {
        $sql = "select id,ename,title,cname,pic from champion";
        return $this->query($sql);
    }

    public function getchampionInfo($id) {
        $sql="select attack,defense,magic,difficulty from champion_info WHERE champion_id='$id'";
        return $this->query($sql);
}
    public function insertChampionData($championDataArr) {
        foreach ($championDataArr as $championDat) {
            $championDatId = $championDat['id'];
            $championDatEname = $championDat['ename'];
            $championDatTitle = $championDat['title'];
            $championDatCname = htmlspecialchars($championDat['cname'], ENT_QUOTES);
            $championDatPic = $championDat['pic'];

            $sql = "insert into champion (id,ename,title,cname,pic) values ($championDatId,'$championDatEname','$championDatTitle','$championDatCname','$championDatPic')";
            if ($this->execute($sql)) {
                $res = array(
                    'msg' => 'success'
                );
            }
        }
        return $res;
    }

    public function insertChampInfo($championDetailArr) {
        foreach ($championDetailArr as $value) {
            $championId = $value['id'];
            $championAttack = $value['info']['attack'];
            $championDefense = $value['info']['defense'];
            $championMagic = $value['info']['magic'];
            $championDifficulty = $value['info']['difficulty'];
            $sql = "insert into champion_info (champion_id,attack,defense,magic,difficulty) values ('$championId',$championAttack,$championDefense,$championMagic,$championDifficulty)";
            if ($this->execute($sql)) {
                $res = array(
                    'msg' => 'success'
                );
            }
        }
        return $res;
    }
}
