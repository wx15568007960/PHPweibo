<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail', 'followers', 'followings'],
        ]);

        $this->middleware('guest', [
            'only' => ['create'],
        ]);
    }

    public function index()
    {
        $users = User::paginate(12);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('users.show', compact('user', 'statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => make_avatar($request->email),
        ]);

        $this->sendEmailConfirmationTo($user);

        session()->flash('warning', '欢迎，但在账号使用前还需要验证你的邮箱：'. $user->email .'，请查收邮件按指示进行验证操作。谢谢！');
        
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'name' => 'required|max:20',
            'password' => 'nullable|confirmed|min:6',
        ]);
        
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }

    public function freshAvatar(User $user)
    {
        $this->authorize('update', $user);

        $user->makeAvatar();

        session()->flash('success', '头像换新成功！');

        return back();
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);

        $user->delete();

        session()->flash('success', '删除用户成功！');

        return back();
    }

    public function sendEmailConfirmationTo(User $user)
    {
        $to = $user->email;
        $subject = '确认邮箱';

        Mail::send('emails.confirm', compact('user'), function ($message) use($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activated_at = now();
        $user->activation_token = null;
        $user->save();

        Auth::login($user);

        session()->flash('success', '恭喜你，账户激活成功，您将开启一段新的旅程~');

        return redirect()->route('users.show', [$user]);
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(24);

        $title = ($user->id == Auth::user()->id ? '我' : $user->name) . '的粉丝';

        return view('users.show_follow', compact('users', 'user', 'title'));
    }

    public function followings(User $user)
    {
        $users = $user->followings()->paginate(24);

        $title = ($user->id == Auth::user()->id ? '我' : $user->name ) . '关注的人';

        return view('users.show_follow', compact('users', 'user', 'title'));
    }
}
