<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //注册
    public function reg(){
        return view("index/reg");
    }
    public function regdo(){
        $user_name=request()->post("user_name");
        $user_email= request()->post("email");
        $user_pwd = request()->input("user_pwd");
        $url="http://www.api.com/api/reg?user_name=".$user_name."&email=".$user_email."&user_pwd=".$user_pwd;
        $request=file_get_contents($url);
        return redirect("index/login");
    }
    //登录
    public function login(){
        return view("index/login");
    }
    public function logindo(){
        $name = request()->input("user_name");
        $pwd = request()->input("user_pwd");
        $url="http://www.api.com/api/login?user_name=".$name."&user_pwd=".$pwd;
        $request=file_get_contents($url);
        return redirect("index/index");
    }
    //首页
    public function index(){
        return view('index/index');
    }
}
