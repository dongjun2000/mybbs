<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        // 1. 表单验证，使用表单验证器
        // 2. 更新数据
        $user->update($request->all());
        // 3. 跳转到个人中心，并且显示更新成功的提示信息
        return redirect()->route('users.show', $user)->with('success', '个人资料更新成功！');
    }
}
