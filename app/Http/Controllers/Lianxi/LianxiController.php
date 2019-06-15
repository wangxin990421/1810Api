<?php

namespace App\Http\Controllers\Lianxi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
class LianxiController extends Controller
{
    /**
     * 支付宝 数据加密练习
     */
    public function alipay()
    {
        $appid = "2016100100636151";
        $ali_gateway = 'https://openapi.alipaydev.com/gateway.do';
        //请求参数;
        $biz_cont = [
            'subject' => '测试订单' . mt_rand(11111, 99999) . time(),
            'out_trade_no' => '1810_' . mt_rand(11111, 99999) . time(),
            'total_amount' => mt_rand(1, 100) / 100,
            'product_code' => 'QUICK_WAP_WAY',
        ];
        //公共参数
        $data = [
            'app_id' => $appid,
            'method' => 'alipay.trade.wap.pay',
            'charset' => 'utf-8',
            'sign_type' => 'RSA2',
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => '1.0',
            'biz_content' => json_encode($biz_cont)
        ];
        //排序
        ksort($data);

        //拼接字符串
        $str0 = "";
        foreach ($data as $k => $v) {
            $str0 .= $k . '=' . $v . "&";
        }
//        echo $str;echo "<hr>";

        $str = rtrim($str0, "&");
//        echo $str;echo "<hr>";die;

        //生成签名
        $private_key = openssl_get_privatekey(file_get_contents("file://" . public_path("keys/priva.pem")));
//        dd($private_key);die;
        openssl_sign($str, $signature, $private_key, OPENSSL_ALGO_SHA256);


        $data['sign'] = base64_encode($signature);
        //dump ($data);die;
        //urlencode
        $param_str = '?';
        foreach ($data as $k => $v) {
            $param_str .= $k . '=' . urlencode($v) . '&';
        }
        $param = rtrim($param_str, '&');
        //echo $param;die;
        $url = $ali_gateway . $param;
        //dd($url);

        //发送GET请求
        header("Location:" . $url);
//        $api = file_get_contents($url);
//        print_r($api);

    }
}
