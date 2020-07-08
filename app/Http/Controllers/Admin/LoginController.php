<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Session;

class LoginController extends Controller
{
    // 后台登录
    public function login() {
        return view('admin.login');
    }

    // 登录验证
    public function doLogin (Request $requset) {
        $data = $requset -> all();
        // 设置验证规则
        $rules = [
            'user_name' => 'required|between:4,18',
            'user_pass' => 'required|alpha_dash|between:4,18',
            'code'      => 'required|captcha',
        ];

        // 自动验证
        $this -> validate($requset, $rules);

        // 验证是否存在此用户
        $user = User::where('user_name', $data['user_name']) -> first();
        if(!$user) {
            return redirect('/admin/login') -> with('errors', '用户不存在！');
        }
        if($user -> user_pass != $data['user_pass']) {
            return redirect('/admin/login') -> with('errors', '密码错误！');
        }

        // 保存用户信息到session中
        Session::put('user', $user);

        // 跳转到后台
        return redirect('/admin/index');
    }

    // 后台首页路由
    public function index () {
        return view('admin.index');
    }
}
