<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registerValid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{

    function login()
    {
        return view("client.login");
    }
    function login_(Request $request)
    {
        if (
            auth()->guard('web')
                ->attempt([
                    'email' => $request['email'],
                    'password' => $request['password']
                ])
        ) {
            $user = auth()->guard('web')->user();
            if ($user->vaitro == 1)
                return redirect('/');
            else
                return redirect('/');
            // else return back()->with('thongbao','Bạn không đủ quyền');

            // return redirect()->intended('/');
        } else
            return back()->with('thongbao', 'Email, Password không đúng');
    }

    function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/login')->with('thongbao', 'Bạn đã thoát thành công');
    }

    function register()
    {
        return view('client.register');
    }

    function register_(registerValid $request)
    {
        // Tiếp nhận dữ liệu từ form
        $email = strtolower(trim(strip_tags($request['email'])));
        $lName = trim(strip_tags($request['lName']));
        $fName = trim(strip_tags($request['fName']));
        $password = trim(strip_tags($request['password']));
        $repass = trim(strip_tags($request['repass']));
        $phone = trim(strip_tags($request['phone']));

        // Kiểm tra xem email đã tồn tại
        $existingUser = DB::table('users')->where('email', $email)->first();
        if ($existingUser) {
            return back()->with('thongbao', 'Email has already been registered!');
        }

        $id_user = DB::table('users')->insertGetId([
            'email' => $email,
            'ho' => $lName,
            'ten' => $fName,
            'dienthoai' => $phone,
            'password' => Hash::make($password) // Hash = bcrypt: mã hóa password
        ]);

        if (auth()->guard('web')->attempt(['email' => $email, 'password' => $password])) {
            // Gửi email
            $user = auth()->guard('web')->user();
            event(new Registered($user));
            return redirect('/notif')->with('thongbao', "Registration is complete!");
        } else {
            return back()->with('thongbao', 'Registration failed!');
        }
    }


    function notif()
    {
        return view('client.notif');
    }
}