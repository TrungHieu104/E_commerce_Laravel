<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminUserValid;


// use Illuminate\Support\Facades\Storage;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perpage = 5;
        $data = User::orderby('id_user', 'asc')->paginate($perpage)->withQueryString();
        return view("admin.User.list", ['data' => $data, 'title' => 'User']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.User.create", ['title' => 'Create User']);
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
// {
//     $ten = $request['ten'];
//     $ho = $request['ho'];
//     $hinh = $request['hinh'];
//     $hinh_file = $request['hinh_file'];
//     $email = $request['email'];
//     $password = $request['password'];
//     $diachi = $request['diachi'];
//     $dienthoai = $request['dienthoai'];
//     $vaitro = (int) $request['vaitro'];
//     if ($request->hasFile('hinh_file')) {
//         $file = $request->file('hinh_file');
//         // $name = time() . '_' . $file->getClientOriginalName();
//         $name = $file->getClientOriginalName();
//         $filePath = '/ADassets/upload/' . $name; // Đường dẫn đến thư mục public
//         Storage::disk('public')->put($filePath, file_get_contents($file));
//         // Lưu file vào thư mục public/ADassets/upload
//     }
//     if($hinh == null){
//         $id_user = DB::table('users')->insertGetId([
//             'ten' => $ten,
//             'ho' => $ho,
//             'hinh' => $filePath,
//             // Lưu đường dẫn tới file ảnh vào cơ sở dữ liệu
//             'email' => $email,
//             'diachi' => $diachi,
//             'dienthoai' => $dienthoai,
//             'vaitro' => $vaitro,
//             'password' => Hash::make($password) // Hash = bcrypt: mã hóa password
//         ]);
//     }else{
//         $id_user = DB::table('users')->insertGetId([
//             'ten' => $ten,
//             'ho' => $ho,
//             'hinh' => $hinh,
//             'email' => $email,
//             'diachi' => $diachi,
//             'dienthoai' => $dienthoai,
//             'vaitro' => $vaitro,
//             'password' => Hash::make($password) // Hash = bcrypt: mã hóa password
//         ]);
//     }

    //     $request->session()->flash('alert', ['type' => 'success', 'message' => 'Create User Successfully']);
//     return redirect('/admin/user');
// }
    public function store(AdminUserValid $request)
    {
        $user = new User;
        $user->ten=$request['ten'];
        $user->ho=$request['ho'];
        $user->hinh=$request['hinh'];
        $user->email=$request['email'];
        $user->password = $request['password'];
        $user->diachi=$request['diachi'];
        $user->dienthoai = $request['dienthoai'];
        $user->vaitro=$request['vaitro'];
        // if($user->hinh == null){
        if($request['hinh'] == null){
            if ($request->hasFile('hinh_file')) {
                $file = $request->file('hinh_file');
                $extension = $file->getClientOriginalExtension();
                $file_name = time() . '.' . $extension;
                $file->move('ADassets/upload/', $file_name);
                $user->hinh = '/ADassets/upload/'.$file_name;
                $user->save();
                $request->session()->flash('alert', ['type' => 'success', 'message' => 'Create User Successfully']);
                return redirect('/admin/user');
            }
        }else{
            $user->save();
            $request->session()->flash('alert', ['type' => 'success', 'message' => 'Create User Successfully']);
            return redirect('/admin/user');
        }


        // $ten = $request['ten'];
        // $ho = $request['ho'];
        // $hinh = $request['hinh'];
        // // $hinh_file = $request['hinh_file'];
        // $email = $request['email'];
        // $password = $request['password'];
        // $diachi = $request['diachi'];
        // $dienthoai = $request['dienthoai'];
        // $vaitro = (int) $request['vaitro'];
        // if ($request->hasFile('hinh_file')) {
        //     $file = $request->file('hinh_file');
        //     $extension = $file->getClientOriginalExtension();
        //     $file_name = time() . '.' . $extension;
        //     $file->move('ADassets/upload/', $file_name);
        //     $hinh_file = '/ADassets/upload/' . $file_name;
        // }
        // if ($hinh == null) {
        //     $id_user = DB::table('users')->insertGetId([
        //         'ten' => $ten,
        //         'ho' => $ho,
        //         'hinh' => $hinh_file,
        //         'email' => $email,
        //         'diachi' => $diachi,
        //         'dienthoai' => $dienthoai,
        //         'vaitro' => $vaitro,
        //         'password' => Hash::make($password) // Hash = bcrypt: mã hóa password
        //     ]);
        // } else {
        //     $id_user = DB::table('users')->insertGetId([
        //         'ten' => $ten,
        //         'ho' => $ho,
        //         'hinh' => $hinh,
        //         'email' => $email,
        //         'diachi' => $diachi,
        //         'dienthoai' => $dienthoai,
        //         'vaitro' => $vaitro,
        //         'password' => Hash::make($password) // Hash = bcrypt: mã hóa password
        //     ]);
        // }

        // $request->session()->flash('alert', ['type' => 'success', 'message' => 'Create User Successfully']);
        // return redirect('/admin/user');
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
    public function edit(Request $request,string $id)
    {
        //
        $user = User::find($id);
        if ($user == null) {
            $request->session()->flash('alert', ['type' => 'fail', 'message' => "Don't have user with id is ". $id]);
            return redirect('/admin/user');
        }
        return view('admin.user.edit', ['user' => $user, 'title' => 'Edit User']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $isUpdate= false;
        $user = User::find($id);
        if($user==null){ 
            $request->session()->flash('alert', ['type' => 'fail', 'message' => "Don't have user with id is ". $id]);
            return redirect('/admin/user');
        }
        $user->ho=$request['ho'];
        $user->ten=$request['ten'];
        $user->hinh=$request['hinh'];
        $user->email=$request['email'];
        $user->password = $request['password'];
        $user->diachi=$request['diachi'];
        $user->dienthoai = $request['dienthoai'];
        $user->vaitro=$request['vaitro'];
        if($request['hinh'] == null){
            if ($request->hasFile('hinh_file')) {
                $file = $request->file('hinh_file');
                $extension = $file->getClientOriginalExtension();
                $file_name = time() . '.' . $extension;
                $file->move('ADassets/upload/', $file_name);
                $user->hinh = '/ADassets/upload/'.$file_name;
                $user->save();
                $request->session()->flash('alert', ['type' => 'success', 'message' => 'Updated Successfully']);
                return redirect('/admin/user');
            }
        }else{
            $user->save();
            $request->session()->flash('alert', ['type' => 'success', 'message' => 'Updated Successfully']);
            return redirect('/admin/user');
        }
        // if($request['hinh']==null ){
        //     $user->hinh=User::find($id)->get('hinh');
        // }

        if($isUpdate == false){
            return back()->with('alert', ['type' => 'fail', 'message' => 'Missing data! Need to enter enough information']);
        }
        //
        // $ten_loai = $request['ten_loai'];
        // $thutu = (int) $request['thutu'];
        // $anhien = (int) $request['anhien'];

        // $updated = DB::table('loai')->where('id_loai', $id)
        //     ->update(['ten_loai' => $ten_loai, 'thutu' => $thutu, 'anhien' => $anhien]);

        // if ($updated) {
        //     return redirect('/admin/user')->with('alert', ['type' => 'success', 'message' => 'Updated Successfully']);
        // } else {
        //     // return back()->with('error', 'Update failed. Please try again.')->withInput();
        //     return back()->with('alert', ['alert', ['type' => 'fail', 'message' => 'There were some errors, please try again later']]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        // $checkRole = DB::table('users')->where('id_user', $id)->value('vaitro');
        // if ($checkRole == 1) {
        //     $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This User cannot be deleted!']);
        //     return redirect('/admin/user');
        // }
        // DB::table('users')->where('id_user', $id)->delete();
        // $request->session()->flash('alert', ['type' => 'success', 'message' => 'Successfully deleted']);
        // return redirect('/admin/user');


        $checkRole = DB::table('users')->where('id_user', $id)->value('vaitro');
        if ($checkRole == 1) {
            $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This user cannot be deleted!']);
            return redirect('/admin/user');
        }
        $user = User::find($id);
        if($user==null){
            $request->session()->flash('alert', ['type' => 'fail', 'message' => 'This user does not exist']);
            return redirect('/admin/user');
        } 
        $user->delete();
        $request->session()->flash('alert', ['type' => 'success', 'message' => 'Deleted Successfully']);
        return redirect('/admin/user');
    }
}