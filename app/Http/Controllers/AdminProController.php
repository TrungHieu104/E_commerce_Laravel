<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class AdminProController extends Controller
{
    public function index()
    {
        //
        $perpage = 5;
        $data = Product::orderby('id_sp', 'asc')->paginate($perpage)->withQueryString();
        $dataCate = Category::all();
        return view("admin.Product.list", ['data' => $data, 'dataCate'=>$dataCate, 'title' => 'Product']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        // $checkRole = DB::table('users')->where('id_user', $id)->value('vaitro');
        // if ($checkRole == 1) {
        //     $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This user cannot be deleted!']);
        //     return redirect('/admin/user');
        // }
        $pro = Product::find($id);
        if($pro==null){
            $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This product does not exist']);
            return redirect('/admin/pro');
        } 
        $pro->delete();
        $request->session()->flash('alert', ['type' => 'success', 'message' => 'Deleted Successfully']);
        return redirect('/admin/pro');
    }
}
