<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function __construct(){
        $CateHeader=Category::where('anhien',1)->get();
        // return view("client.shop",['data'=>$data]);
        View::share(compact('CateHeader'));

    }
    function index(){
        return view("client.home");
    }
    function contactUs(){
        return view("client.contactUs");
    }
    function blog(){
        return view("client.blog");
    }
    
    function register(){
        return view("client.register");
    }
    function emptycart(){
        return view("client.emptycart");
    }
    // function cart(){
    //     return view("client.cart");
    // }
    function checkout(){
        return view("client.checkout");
    }
    function faq(){
        return view("client.faq");
    }
    function aboutus(){
        return view("client.aboutus");
    }
    function page404(){
        return view("client.404");
    }
    
}
