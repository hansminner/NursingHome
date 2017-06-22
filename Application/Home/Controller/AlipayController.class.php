<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //=============================================
    //本代码并非完美,也许存在不良之处,高手请多指点,请勿吐槽!
    //作者 小曾 Qq839024615 可加我一起交流
    //=============================================
    //注意以下代码是双功能收款代码(担保),非即时到账,网关,网银//
    //原理
    //用户提交请求,建立订单数据,跳至支付宝,支付成功后跳转(同步通知)
    //同步通知道验证成功后,支付宝同时会返回支付信息,如单号,金额
    //订时同步通知须与我们建立的订单数据对比,如果是则账户到账
    //一般都是一样的,因为支付宝会验证签名这是加密的
    //诺支付后没有跳转到同步通知怎么办,有异步通知防止订单丢失
    //当支付完成后,因各种原因没有跳转,支付宝服务器会在1分钟内自动
    //发送通知到您的服务器,也就是异步通知地址,异步文件接到后再进行处理
    //诺又支付成功,也就是同步已处理过了,就不用处理了,告诉支付宝success已处理
    //否则支付宝会不断的发出通知,直到24小时22分不再发送,
    //诺同步通知未处理(也就是没跳转导致没处理),那就进行处理,得理成功
    //同样返回success给支付宝服务器,诺处理失败则返回任何文字即可
    //支付宝服务器知道你未处理成功,会再次发送通知
    //让你处理完为止,否则24小时22分后不再发送
    //支付宝提交
    public function alipay(){
        /**************************支付宝配置**************************/
        $alipay_config['partner']        = '2088****284';
        $alipay_config['seller_email']    = 'xz**********@139.com';
        $alipay_config['key']            = 'wvajc*************bixumm';
        $alipay_config['sign_type']    = strtoupper('MD5');
        $alipay_config['input_charset']= strtolower('utf-8');
        //cacert.pem文件放根目录 log.txt也放根目录
        //cacert.pem 是签名用的 log.txt是调试用写日志的
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
        $alipay_config['transport']    = 'http';
        //异步地址 就是支付完支付宝服务器会向这个地址发送数据,防止订单丢失
        $notify_url="http://你的域名".U("Alipay/notify_url");
        //同步跳转地址 就是支付完后跳转到这里
        $return_url="http://你的域名".U("Alipay/return_url");
        //注意伪静态隐藏index.php 否则无效 因回调地址带 xxx.php?a=b GET参数
        //伪静态后地址 http://abc.com/Alipay/return_url.html 不可有GET哈

        /**************************支付宝配置**************************/
        $price=$_POST['price'];//支付金额
        $out_trade_no="M".Date("YmdHis",time()).time();//商户订单号
        vendor('AliPay.alipay_submit#class');//引入支付宝类库

        /**************************存入充值记录**************************/
        $data['uid']=session('id');
        $data['rmb']=$price;
        $data['type']="支付宝";
        $data['code']=$out_trade_no;
        $data['time']=time();
        $data['yes']=0;
        $ispay=M('Pay')->add($data);
        if(!$ispay){
            $this->error("订单写入失败");//提交过来入库,如果入库失败,则不往下执行支付宝
        }

        /**************************请求参数**************************/
        //支付类型
        $payment_type = "1";
        //商户订单号
        $out_trade_no = $out_trade_no;
        //订单名称
        $subject = "梦币充值";
        //必填
        //付款金额
        $price = $price;
        //必填
        //商品数量
        $quantity = "1";
        //必填，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品
        $logistics_fee = "0.00";
        //必填，即运费
        //物流类型
        $logistics_type = "EXPRESS";
        //必填，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
        //物流支付方式
        $logistics_payment = "SELLER_PAY";
        //必填，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）
        //订单描述
        $body = "梦雪psd下载网 - 梦币充值";
        //商品展示地址
        $show_url = "http://www.qq839.com/index.php";
        //需以http://开头的完整路径，如：http://www.商户网站.com/myorder.html
        //收货人姓名
        $receive_name = $_POST['WIDreceive_name'];
        //如：张三
        //收货人地址
        $receive_address = $_POST['WIDreceive_address'];
        //如：XX省XXX市XXX区XXX路XXX小区XXX栋XXX单元XXX号
        //收货人邮编
        $receive_zip = $_POST['WIDreceive_zip'];
        //如：123456
        //收货人电话号码
        $receive_phone = $_POST['WIDreceive_phone'];
        //如：0571-88158090
        //收货人手机号码
        $receive_mobile = $_POST['WIDreceive_mobile'];
        //如：13312341234
        /************************************************************/
        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service" => "trade_create_by_buyer",
            "partner" => trim($alipay_config['partner']),
            "seller_email" => trim($alipay_config['seller_email']),
            "payment_type"    => $payment_type,
            "notify_url"    => $notify_url,
            "return_url"    => $return_url,
            "out_trade_no"    => $out_trade_no,
            "subject"    => $subject,
            "price"    => $price,
            "quantity"    => $quantity,
            "logistics_fee"    => $logistics_fee,
            "logistics_type"    => $logistics_type,
            "logistics_payment"    => $logistics_payment,
            "body"    => $body,
            "show_url"    => $show_url,
            "receive_name"    => $receive_name,
            "receive_address"    => $receive_address,
            "receive_zip"    => $receive_zip,
            "receive_phone"    => $receive_phone,
            "receive_mobile"    => $receive_mobile,
            "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
        );

        //建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }
    //支付宝同步跳转
    public function return_url(){
        /**************************支付宝配置**************************/
        $alipay_config['partner']        = '20881*****10284';
        $alipay_config['seller_email']    = 'xz6*****9.com';
        $alipay_config['key']            = 'wvajcc*****igbixumm';
        $alipay_config['sign_type']    = strtoupper('MD5');
        $alipay_config['input_charset']= strtolower('utf-8');
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
        $alipay_config['transport']    = 'http';
        /**************************支付宝配置**************************/
        vendor('AliPay.alipay_notify#class');//引入类
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        if($verify_result) {
            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_GET['trade_no'];
            //交易状态
            //这里由自己写,也可以在这里直接写充值到账,也可以判断是否充值成功
            //异步通知写到账,我在这判断异步是否处理,这个由自己发挥
            $trade_status = $_GET['trade_status'];
            $where['code']=$out_trade_no;
            $F=M('Pay')->where($where)->find();
            if($F['yes']==0){
                $this->success("充值失败或正在处理,请等待几分钟",U('User/index'));
            }else{
                $this->success("充值成功",U('User/index'));
            }
        }else {
            echo "验证失败";
        }
    }
    //支付宝异步通知
    public function notify_url(){
        /**************************支付宝配置**************************/
        $alipay_config['partner']        = '2088******0284';
        $alipay_config['seller_email']    = 'x******.com';
        $alipay_config['key']            = 'wvaj******ixumm';
        $alipay_config['sign_type']    = strtoupper('MD5');
        $alipay_config['input_charset']= strtolower('utf-8');
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
        $alipay_config['transport']    = 'http';
        //这个配置可引入,无须多写填写
        /**************************支付宝配置**************************/
        vendor('AliPay.alipay_notify#class');
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        if($verify_result) {//验证成功
            $out_trade_no = $_POST['out_trade_no'];
            //支付宝交易号
            $trade_no = $_POST['trade_no'];
            //交易状态
            $trade_status = $_POST['trade_status'];
            if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
                //该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序

                echo "success";        //请不要修改或删除

                //调试用，写文本函数记录程序运行情况是否正常
                logResult("产生了交易记录，但没有付款-{$out_trade_no}\r\n");
            }else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
                //该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                $Pay=M('Pay');
                $where['code']=$out_trade_no;
                $where['yes']=0;
                $F=$Pay->where($where)->find();
                if($F){
                    //这里是充值成功,这里由你们自己发挥,请勿用我的,我写了函数
                    $uid=$F['uid'];
                    $score=$F['金额']*20;
                    Get_User_Score_Add($uid,$score);
                    $Pay->where($where)->setField('yes',1);
                    $title='充值梦币!'.$score;
                    $body='您在'.date('Y-m-d H:i:s',$F['time']).'<br />充值了'.$score.'梦币<br />如果您对本站有疑问或建议,请联系小曾QQ839024615!';
                    Notice_Add(getUserIdUser($uid),$title,$body);
                    //这里是充值成功,这里由你们自己发挥,请勿用我的,我写了函数
                }

                echo "success";        //请不要修改或删除

                //调试用，写文本函数记录程序运行情况是否正常
                logResult("付款成功-{$out_trade_no}\r\n");
            }else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
                //该判断表示卖家已经发了货，但买家还没有做确认收货的操作

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序

                echo "success";        //请不要修改或删除

                //调试用，写文本函数记录程序运行情况是否正常
                logResult("卖家已经发了货，但买家还没有做确认收货-{$out_trade_no}\r\n");
            }else if($_POST['trade_status'] == 'TRADE_FINISHED') {
                //该判断表示买家已经确认收货，这笔交易完成

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序

                echo "success";        //请不要修改或删除

                //调试用，写文本函数记录程序运行情况是否正常
                logResult("买家已经确认收货-{$out_trade_no}\r\n");
            } else {
                //其他状态判断
                echo "success";

                //调试用，写文本函数记录程序运行情况是否正常
                logResult ("其他失败-{$out_trade_no}\r\n");
            }
        }else {
            //验证失败
            echo "fail";
            logResult ("验证失败-{$_POST['out_trade_no']}\r\n");
        }

    }
    //=============================================
    //本代码并非完美,也许存在不良之处,高手请多指点,请勿吐槽!
    //作者 小曾 Qq839024615 可加我一起交流
    //=============================================
}