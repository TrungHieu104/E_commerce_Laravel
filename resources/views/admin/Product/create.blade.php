@extends('admin.layout')

@section('title')
    | Create Product
@endsection

@section('content')
{{-- chưa xong --}}
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
                <h3>Insert Data</h3>

                <i class='bx bx-search'></i>
                <a href="{{ url('/admin/user/create') }}">
                    <i class='bx bx-plus'></i>
                </a>
            </div>
            <form id="frm" method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">@csrf
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input name="ho" type="text" class="form-control"> <br>
                                <span class="text-danger mr-30px"> @error('ho')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </td>
                            <td>
                                <span class="text-danger mr-30px"> 
                                <input name="ten" type="text" class="form-control">
                                    <br> @error('ten')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </td>
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
                                <span class="text-danger mr-30px"> <br> @error('hinh')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </td>
                            <td>
                                <input name="email" type="email" class="form-control">
                                <span class="text-danger mr-30px"> <br>
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <br>
                    <thead>
                        <th>Hot</th>
                        <th>Hide / Show</th>
                        <th>TinhChat</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        <td>
                            <input name="password" type="password" class="form-control">
                            <span class="text-danger mr-30px"> <br>
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </td>
                        <td>
                            <input name="anhien" class="w_25" type="radio" value="0"checked> <span>Hide</span>
                            <input name="anhien" class="w_25" type="radio" value="1"> <span>Show</span>
                            <span class="text-danger mr-30px"> <br>
                                @error('diachi')
                                    {{ $message }}
                                @enderror
                            </span>
                        </td>
                        <td>
                            <input name="dienthoai" type="text" class="form-control">
                            <span class="text-danger mr-30px"> <br>
                                @error('dienthoai')
                                    {{ $message }}
                                @enderror
                            </span>
                        </td>
                        <td><select name="vaitro" id="" class="form-control">
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
