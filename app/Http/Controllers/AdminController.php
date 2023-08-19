<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
// use App\Http\Controllers\UserController;


class AdminController extends Controller
{
    //
    function index(){
        return view("admin.home",['title' => '']);
    }
    // function list(){
    //     return view("admin.Category.list");
    // }
}
