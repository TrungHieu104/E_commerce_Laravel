@extends('admin.layout')

@section('title')
    | Edit Category
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
                <h3>Edit Data{{$loai->ten_loai}}</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-plus'></i>
            </div>
            @if(Session::exists('alert'))
                 <div class="alert alert-{{ session('alert')['type'] }}">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                     <strong>{{ session('alert')['message'] }}</strong> 
                 </div>
             @endif
            <form id="frm" method="post" action="{{route('admin.cate.update', $loai->id_loai)}}">
                @csrf @method('PUT')
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
                                <input name="ten_loai" type="text" class="form-control" value="{{ $loai->ten_loai }}">
                            </th>
                            <th>
                                <input name="thutu" type="number" class="form-control" min="1" value="{{$loai->thutu }}">
                            </th>
                            <th>
                                <input name="anhien" class="w_25" type="radio" value="0"{{ $loai->anhien==0? "checked":"" }}> <span>Hide</span>
                                <input name="anhien" class="w_25" type="radio" value="1"{{ $loai->anhien==1? "checked":"" }}> <span>Show</span>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn"> Save</button>
            </form>
        </div>
    </div>
@endsection
