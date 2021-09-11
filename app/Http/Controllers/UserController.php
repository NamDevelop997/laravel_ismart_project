<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function show(Request $request)
    {

        $keyword = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }

        $users = User::where('name', 'like', "%{$keyword}%")->paginate(20);
        return view('layouts.user.user_list', compact('users'));
    }

    function add()
    {
        return view('layouts.user.add_user');
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required | string | min:6 | max:255',
                'email' => 'required | string | email | max:255 | min:15| unique:users',
                'password' => 'required | string | min:8 | confirmed'
            ],
            [],
            [
                'name' => "Họ và tên",
            ]

        );

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('dashboard/user/list')->with('success', 'Thêm thành viên thành công!');
    }
}
