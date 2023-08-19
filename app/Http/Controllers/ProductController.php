<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;

// use Illuminate\Pagination\Paginator;



class ProductController extends Controller
{
    //
    // function __construct($id=0){
    //     $data1=ProductDetails::find($id=0);
    //     // return view("client.shop",['data'=>$data]);
    //     View::share('client.productDetail', $data1);

    // }
    function shop(){
        $perpage = 15;
        $data=Product::orderby('id_sp','desc')->paginate($perpage)->withQueryString();
        return view("client.shop",['data'=>$data,'title' => 'Shop']);
    }
    function mostViewed(){
        $perpage = 15;
        $data=Product::orderby('soluotxem','desc')->paginate($perpage)->withQueryString();
        return view("client.shop",['data'=>$data,'title' => 'Most Viewed']);
    }
    function newProduct(){
        $perpage = 15;
        $data=Product::orderby('ngay','desc')->paginate($perpage)->withQueryString();
        return view("client.shop",['data'=>$data,'title' => 'New Products']);
    }
    function hotProduct(){
        $perpage = 15;
        $data=Product::orderby('hot','desc')->paginate($perpage)->withQueryString();
        return view("client.shop",['data'=>$data,'title' => 'Hot Products']);
    }
    function shopCate($id_loai=0){
        $listCate = DB::table('sanpham')
        ->where('id_loai',$id_loai)
        ->paginate(15);
        $ten=DB::table('loai')->where('id_loai',$id_loai)->value('ten_loai');
        // $list=Product::find($id_loai);
        // $ProductDetails=ProductDetails::find($id);
        return view("client.shopCate",['ten'=>$ten, 'listCate'=>$listCate ]);
    }
    function singleProduct($id=0){
        $data=Product::find($id);
        $ProductDetails=ProductDetails::find($id);
        return view("client.productDetail",['data'=>$data, 'ProductDetails'=>$ProductDetails]);
    }
                            // >>>>>  Add Cart  <<<<<

    // function showCart(Request $request){
    //     $cart =  $request->session()->get('cart'); 
    //     if (count($cart) <= 0){
    //     return redirect('/emptyCart');
    //     }
    //     return view('client.cart', ['cart'=> $cart]);
    // }
    function showCart(Request $request){
        $cart = $request->session()->get('cart'); 
        if (!is_array($cart) || count($cart) <= 0){
            return redirect('/emptyCart');
        }
        return view('client.cart', ['cart'=> $cart]);
    }
    

    function addToCart(Request $request, $id_sp = 0, $soluong=1){
        if ($request->session()->exists('cart')==false) {//chưa có cart trong session           
            $request->session()->push('cart', ['id_sp'=> $id_sp,  'soluong'=> $soluong]);          
        } else {// đã có cart, kiểm tra id_sp có trong cart không
            $cart =  $request->session()->get('cart'); 
            $index = array_search($id_sp, array_column($cart, 'id_sp'));
            if ($index!=''){ //id_sp có trong giỏ hàng thì tăhg số lượng
                $cart[$index]['soluong']+=$soluong;
                $request->session()->put('cart', $cart);
            }
            else { //sp chưa có trong arrary cart thì thêm vào 
                $cart[]= ['id_sp'=> $id_sp, 'soluong'=> $soluong];
                $request->session()->put('cart', $cart);
            }    
        }        
        //$request->session()->forget('cart');
        return redirect('/cart');

    }
    public function deleteAllCart(Request $request) {
        $request->session()->forget('cart');
        return redirect('/');

        // return redirect()->back();
    }
    function delProductInCart(Request $request, $id_sp=0){
        $cart =  $request->session()->get('cart'); 
        $index = array_search($id_sp, array_column($cart, 'id_sp'));
        if ($index!=''){ 
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return redirect('/cart');
    }
    
    
    
    
    
}
