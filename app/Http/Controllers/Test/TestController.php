<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getwxtoken(){

        $appid= "wx3604d90bd402abcb";
        $appsecret="6bed0f1793738df4c16e369f4bb411a0";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
        $data=file_get_contents($url);
        echo $data;
    }
    public function getwxtoken1(){
        $appid= "wx3604d90bd402abcb";
        $appsecret="6bed0f1793738df4c16e369f4bb411a0";
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;

    }
}
