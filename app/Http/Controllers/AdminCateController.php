<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminCateValid;


class AdminCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpage = 5;
        $data = Category::orderby('id_loai', 'asc')->paginate($perpage)->withQueryString();
        return view("admin.Category.list", ['data' => $data, 'title' => 'Category']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.Category.create", ['title' => 'Create Category']);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCateValid $request)
    {
        $cate = new Category;
        $cate->ten_loai = $request['ten_loai'];
        $cate->thutu = $request['thutu'];
        $cate->anhien = $request['anhien'];
        $cate->save();
        // $ten_loai = $request['ten_loai'];
        // $thutu = (int) $request['thutu'];
        // $anhien = (int) $request['anhien'];
        // DB::table('loai')->insert(['ten_loai' => $ten_loai, 'thutu' => $thutu, 'anhien' => $anhien]);
        return redirect('/admin/cate');
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
    public function edit(Request $request, string $id)
    {
        //
        $loai = DB::table('loai')->where('id_loai', $id)->first();
        if ($loai == null) {
            $request->session()->flash('thongbao', 'Không có loại này: ' . $id);
            return redirect('/admin/cate');
        }
        return view('admin.Category.edit', ['loai' => $loai, 'title' => 'Edit Category']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ten_loai = $request['ten_loai'];
        $thutu = (int) $request['thutu'];
        $anhien = (int) $request['anhien'];

        $updated = DB::table('loai')->where('id_loai', $id)
            ->update(['ten_loai' => $ten_loai, 'thutu' => $thutu, 'anhien' => $anhien]);

        if ($updated) {
            return redirect('/admin/cate')->with('alert', ['type' => 'success', 'message' => 'Updated Successfully']);
        } else {
            // return back()->with('error', 'Update failed. Please try again.')->withInput();
            return back()->with('alert', ['alert', ['type' => 'fail', 'message' => 'There were some errors, please try again later']]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $sosp = DB::table('sanpham')->where('id_loai', $id)->count();
        if ($sosp > 0) {
            $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This category cannot be deleted!']);
            return redirect('/admin/cate');
        }
        $cate = Category::find($id);
        if($cate==null){
            $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This category does not exist']);
            return redirect('/admin/cate');
        } 
        $cate->delete();
        $request->session()->flash('alert', ['type' => 'success', 'message' => 'Deleted Successfully']);
        return redirect('/admin/cate');

        // $sosp = DB::table('sanpham')->where('id_loai', $id)->count();
        // if ($sosp > 0) {
        //     $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This category cannot be deleted!']);
        //     return redirect('/admin/cate');
        // }
        // DB::table('loai')->where('id_loai', $id)->delete();
        // $request->session()->flash('alert', ['type' => 'success', 'message' => 'deleted Successfully']);
        // return redirect('/admin/cate');
    }

}