@extends('admin.layout')

@section('title')
    | Create Category
@endsection

@section('content')
    <style>
        #content main .table-data .order table th {
            text-align: center
        }

        #content main .table-data .order table tbody tr:hover {
            background: #F9F9F9 !important;
        }
    </style>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Insert Data</h3>
                <i class='bx bx-search'></i>
                <a href="{{ url('/admin/cate/create') }}">
                    <i class='bx bx-plus'></i>
                </a>
            </div>
            <form id="frm" method="post" action="{{ route('admin.cate.store') }}">@csrf
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Arrange</th>
                            <th>Hide / Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <input name="ten_loai" type="text" class="form-control">
                                <span class="text-danger"> <br> @error('ten_loai')
                                    {{ $message }}
                                @enderror </span>
                                
                            </th>
                            <th>
                                <input name="thutu" type="number" class="form-control" min="1">
                                <span class="text-danger"><br> @error('thutu')
                                    {{ $message }}
                                @enderror </span>
                            </th>
                            <th>
                                <input name="anhien" class="w_25" type="radio" value="0"checked> <span>Hide</span>
                                <input name="anhien" class="w_25" type="radio" value="1"> <span>Show</span>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn"> Save</button>
            </form>
        </div>
    </div>
@endsection
