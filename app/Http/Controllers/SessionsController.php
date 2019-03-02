<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create'],
        ]);
    }
    
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            
            $fallback = route('users.show', Auth::user());

            return redirect()->intended($fallback);
        } else {
            session()->flash('danger', '邮箱或密码错误！');
            
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        session()->flash('success', '退出登陆成功。期待你的再次光临！');

        return redirect()->route('login');
    }
}
