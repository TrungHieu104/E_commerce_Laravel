@extends('admin.layout')

@section('title')
    | Edit User
@endsection

@section('content')
    <style>
        #content main .table-data .order table th {
            text-align: center
        }

        #content main .table-data .order table tbody tr:hover {
            background: #F9F9F9 !important;
        }

        .form-control {
            width: 70%;
            margin: 10px 50px;
            padding: 20px 10px;
            border: none;
            background: var(--grey);
        }
    </style>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Edit Data: {{ $user->ho }} {{ $user->ten }}</h3>

                <i class='bx bx-search'></i>
                <a href="{{ url('/admin/user/create') }}">
                    <i class='bx bx-plus'></i>
                </a>
            </div>
            @if (Session::exists('alert'))
                <div class="alert alert-{{ session('alert')['type'] }}">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>{{ session('alert')['message'] }}</strong>
                </div>
            @endif
            <form id="frm" method="post" action="{{ route('admin.user.update', $user->id_user) }}" enctype="multipart/form-data">@csrf @method('PUT')
                <table>
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input name="ho" type="text" class="form-control" value="{{ $user->ho }}"></td>
                            <td><input name="ten" type="text" class="form-control" value="{{ $user->ten }}"></td>
                            <td class="avatar-td">
                                <input class="select" name="hinh_type" type="radio" value="text" onclick="showText();">
                                Link
                                <input class="select" name="hinh_type" type="radio" value="file" onclick="showFile();">
                                File
                                <br>
                                <div id="hinh_input">
                                    <input name="hinh" type="text" class="form-control" style="display:none">
                                    <input name="hinh_file" type="file" class="form-control" style="display:none">
                                </div>
                            </td>
                            <td><input name="email" type="email" class="form-control"></td>
                        </tr>
                    </tbody>
                    <br>
                    <thead>
                        <th>Password</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                        <td><input name="password" type="password" class="form-control" ></td>
                        <td><input name="diachi" type="text" class="form-control" value="{{ $user->diachi }}"></td>
                        <td><input name="dienthoai" type="text" class="form-control" value="{{ $user->dienthoai }}"></td>
                        <td><select name="vaitro" id="" class="form-control">
                                
                                <option value="{{ $user->vaitro }}">{{ $user->vaitro == 0 ? 'User' : 'Admin' }}</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select></td>
                    </tbody>

                </table>
                <button type="submit" class="btn"> Save</button>
            </form>

        </div>

    </div>

    <script>
        function showText() {
            document.getElementById('hinh_input').innerHTML = '<input name="hinh" type="text" class="form-control">';
        }

        function showFile() {
            document.getElementById('hinh_input').innerHTML = '<input name="hinh_file" type="file" class="form-control">';
        }
    </script>
@endsection
