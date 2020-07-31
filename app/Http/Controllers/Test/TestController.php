<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    //获取token
    public function getwxtoken(){

        $appid= "wx3604d90bd402abcb";
        $appsecret="6bed0f1793738df4c16e369f4bb411a0";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
        $data=file_get_contents($url);
        echo $data;
    }
    public function getwxtoken2(){
        $appid= "wx3604d90bd402abcb";
        $appsecret="6bed0f1793738df4c16e369f4bb411a0";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;

        // 创建一个新cURL资源
                $ch = curl_init();

        // 设置URL和相应的选项
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // 抓取URL并把它传递给浏览器
                $res=curl_exec($ch);

        // 关闭cURL资源，并且释放系统资源
                curl_close($ch);
                echo $res;
    }
    public function getwxtoken3(){
        $appid= "wx3604d90bd402abcb";
        $appsecret="6bed0f1793738df4c16e369f4bb411a0";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;

        //实例化客户端
        $client = new Client();

        //get请求
        $res = $client->request('GET', $url);

        //返回状态码
        echo $res->getStatusCode();

        //连贯操作
        $res = $client->request('GET', $url)->getBody()->getContents();
        echo $res;
    }
    //连接api接口
    public function apiinit(){
        $url="http://www.api.com/test/reg";
        $request=file_get_contents($url);
        echo $request;
    }

    //对称加密
    public function encrypt(){
        $data = "对称加密";
        $method = "AES-256-CBC";
        $key = "1911_api";
        $iv = "aaaabbbbccccdddd";
        $enc = openssl_encrypt($data,$method,$key,OPENSSL_RAW_DATA,$iv);
        $enc_data = base64_encode($enc);
        echo $enc_data;
        echo "<hr>";
        $url="http://www.api.com/test/decrypt";
        // 创建一个新cURL资源
        $ch = curl_init();
        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        // 	启用时会将头文件的信息作为数据流输出
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //传值
        curl_setopt($ch,CURLOPT_POSTFIELDS,$enc_data);
        //通过变量接受响应
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 抓取URL并把它传递给浏览器
        $res=curl_exec($ch);
        // 关闭cURL资源，并且释放系统资源
        curl_close($ch);
        echo $res;
    }
    //非对称加密（1）
    public function no_encrypt(){
        $data = "今晚偷杨老二家的母猪";
        $content = file_get_contents(storage_path("key/1911_priv.key"));//获取私钥内容
        $pub_key = openssl_get_privatekey($content);//获取私钥
        openssl_private_encrypt($data,$enc_data,$pub_key);//私钥加密

        //需要调用接口的地址
        $url="http://www.api.com/test/no_decrypt";
        // 创建一个新cURL资源
        $ch = curl_init();
        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        // 	启用时会将头文件的信息作为数据流输出
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //传值
        curl_setopt($ch,CURLOPT_POSTFIELDS,$enc_data);
        //通过变量接受响应
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 抓取URL并把它传递给浏览器
        $res=curl_exec($ch);
        // 关闭cURL资源，并且释放系统资源
        curl_close($ch);

        //echo $res;die;

        //接受解密
        $content = file_get_contents(storage_path("key/api_pub.key"));//获取公钥内容
        $pub_key = openssl_get_publickey($content);//获取公钥
        openssl_public_decrypt($res,$abc,$pub_key);//公钥解密
        echo $abc;
    }
    //签名
    public function name1(){
        $key = "api_1911";
        $name = "杨万星";
        $sign = md5($key.$name);
        $res = 'http://www.api.com/test/name2?name='.$name.'&data='.$sign;
        $url = file_get_contents($res);
        echo $url;
    }
    //签名非对称加密
    public function nam_encrypt(){
        $content = "签名加密";
        $key = file_get_contents(storage_path('key/1911_priv.key'));
        $pri_key = openssl_get_privatekey($key);
        openssl_sign($content,$enc,$pri_key);
        $data = base64_encode($enc);
        $res = 'http://www.api.com/test/nam_decrypt?content='.urlencode($content).'&data='.urlencode($data);
        $fil = file_get_contents($res);
        echo $fil;
    }
    //签名对称加密
    public function nam_enc1(){

    }
}
