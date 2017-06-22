<?php
namespace Org\Util;
/**
 * DwiWan 带玩游戏平台 PHP版本 DEMO
 * @desc 使用说明
 *       require "Daiwan.php";
 *       $daiwan=new Daiwan("XXXXX-XXXXX-XXXXX-XXXXX");
 *       函数 获取api地址
 *          例:获取用户信息 $apiUrl=$daiwan->getMethod("UserArea","xxx");
 *                          返回:api地址
 *          说明:getMethod 参数根据出现的位置依次填入
 *       函数 获取api数据
 *          例:获取用户信息 $daiwan->curl($apiUrl);
 *                          返回:json数据
 */
class Daiwan {
    var $key = "";
    var $base_url = "http://lolapi.games-cube.com";

    public function __construct($str) {
        if (empty($str)) {
            echo "请填写令牌信息";
        } else {
            $this->key = $str;
        }
    }

    public function getMethod($type) {
        $method = "";
        switch ($type) {
            case "UserArea":
                $method = "/UserArea?keyword=" . urlencode(func_get_arg(1));
                break;
            // keyword:游戏用户名，如果游戏用户名为中文或是特殊字符需要进行URL编码后再传递
            case "UserHotInfo":
                $method = "/UserHotInfo?qquin=" . func_get_arg(1) . "&vaid=" . func_get_arg(2);
                break;
            // qquin:英雄联盟用户唯一标识，获取方式从API UserArea中进行获取
            // vaid:大区ID
            case "Free":
                $method = "/Free";
                break;
            case "ChampionRank":
                $method = "/ChampionRank?championid=" . func_get_arg(1) . "&p=" . func_get_arg(2);
                break;
            // championid:英雄标识，获取方式从API Champion中进行获取
            // p:指定页数
            case "GetChampionDetail":
                $method = "/GetChampionDetail?champion_id=" . func_get_arg(1);
                break;
            // champion_id:英雄ID，来源于接口国服API字典数据-英雄数据 [Champion]
            case "UserExtInfo":
                $method = "/UserExtInfo?qquin=" . func_get_arg(1) . "&vaid=" . func_get_arg(2);
                break;
            // qquin:英雄联盟用户唯一标识，获取方式从API UserArea中进行获取
            // vaid:大区唯一标识
            case "BattleSummaryInfo":
                $method = "/BattleSummaryInfo?qquin=" . func_get_arg(1) . "&vaid=" . func_get_arg(2);
                break;
            // qquin:英雄联盟用户唯一标识，获取方式从API UserArea中进行获取
            // vaid:大区唯一标识
            case "CombatList":
                $method = "/CombatList?qquin=" . func_get_arg(1) . "&vaid=" . func_get_arg(2) . "&p=" . func_get_arg(3);
                break;
            // qquin:英雄联盟用户唯一标识，获取方式从API UserArea中进行获取
            // vaid:区服ID
            // p:分页信息
            case "GameDetail":
                $method = "/GameDetail?qquin=" . func_get_arg(1) . "&vaid=" . func_get_arg(2) . "&gameid=" . func_get_arg(3);
                break;
            // qquin:英雄联盟用户唯一标识，获取方式从API UserArea中进行获取
            // vaid:大区ID
            // gameid:英雄联盟游戏唯一标识
            case "Champion":
                $method = "/champion";
                break;
            case "Area":
                $method = "/Area";
                break;
            case "GetTierQueue":
                $method = "/GetTierQueue?tier=" . func_get_arg(1) . "&queue=" . func_get_arg(2);
                break;
            // tier:段位 5 青铜 4 白银 3 黄金 2 白金 1 钻石 0 最强王者 6 超凡大师 255 无段位
            // queue:级别 0 一 1 二 2 三 3 四 4 五
            // 例: 50 = 青铜一
            case "GetUserIcon":
                $method = "/GetUserIcon?iconid=" . func_get_arg(1);
                break;
            // iconid:用户图标ID
            case "GetAreaName":
                $method = "/GetAreaName?id=" . func_get_arg(1);
                break;
            // id:大区ID
            case "GetChampionSkin":
                $method = "/GetChampionSkin?champion_id=" . func_get_arg(1) . "&skinid=" . func_get_arg(2);
                break;
            // skinid:皮肤ID
            case "GetChampionIcon":
                if (is_numeric(func_get_arg(1))) {
                    $method = "http://lolapi.games-cube.com/GetChampionIcon?id=" . func_get_arg(1);
                } else {
                    $method = "http://lolapi.games-cube.com/GetChampionIcon?championname=" . func_get_arg(1);
                }
                break;
            case "GetSummonSpellIcon":
                $method = "/GetSummonSpellIcon?summonspellid=" . func_get_arg(1);
                break;
            case "GetitemIcon":
                $method = "/GetitemIcon?itemid=" . func_get_arg(1);
                break;
            case "GetChampionCNName":
                $method = "/GetChampionCNName?id=" . func_get_arg(1);
                break;
            case "GetChampionENName":
                $method = "/GetChampionENName?id=" . func_get_arg(1);
                break;
            case "GetMapName":
                $method = "/GetMapName?id=" . func_get_arg(1);
                break;
            case "GetMapImage":
                $method = "/GetMapImage?id=" . func_get_arg(1);
                break;
            case "GetJudgement":
                $method = "/GetJudgement?flag=" . func_get_arg(1);
                break;
            // flag:单场比赛中的Flag
            case "GetWin":
                $method = "/GetWin?win=" . func_get_arg(1);
                break;
            case "GetGameType":
                $method = "GetGameType?game_type=" . func_get_arg(1);
                break;
        }
        return $this->base_url . $method;
    }

    public function curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "DAIWAN-API-TOKEN:" . $this->key
        ));
        $return = curl_exec($ch);
        curl_close($ch);
        return $return;
    }
}
