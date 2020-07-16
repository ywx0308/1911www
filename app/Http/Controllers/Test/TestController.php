<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
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


    public function apiinit(){
        $url="http://www.api.com/test/getwxtoken";
        $request=file_get_contents($url);
        echo $request;
    }
}
