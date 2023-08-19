@extends('admin.layout')

@section('title')
    | User
@endsection

@section('content')
<style>
    .img_ad{
        width: 150px !important;
        height: 120px !important;
        border-radius: 0 !important;
    }
</style>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Data</h3>

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

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                        <tr>
                            <td>{{ $dt->id_user }}</td>

                            <td>
                                <p>{{ $dt->ho }} {{ $dt->ten }}</p>
                            </td>
                            @if ($dt->hinh == null)
                                <td><p>Null</p></td>
                            @else
                                <td><img class="img_ad" src="{{ $dt->hinh }}" alt=""></td>
                            @endif
                                {{-- <td>
                                    <img class="img_ad" src="{{ $dt->hinh }}" alt="">
                                </td> --}}
                            <td>{{ $dt->email }}</td>

                            @if ($dt->diachi == null)
                                <td>{{ $dt->dienthoai }}</td>
                            @else
                                <td>{{ $dt->diachi }}<br> {{ $dt->dienthoai }}</td>
                            @endif

                            <td>{{ $dt->vaitro == 0 ? 'User' : 'Admin' }}</td>
                            
                            <td class="d_flex ">
                                <a href="{{ route('admin.user.edit', $dt->id_user) }}"><span class="status completed">Edit</span> </a>
                                <form action="{{ route('admin.user.destroy', $dt->id_user) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="status danger" style="border: none;cursor: pointer;" type='submit'
                                        onclick="return confirm('Xóa hả')">
                                        Delete
                                    </button>
                                </form>
                                {{-- <a href=""><span >Delete</span> </a> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="pagination-container">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($data->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($data->onEachSide(1)->links()->elements as $element)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($element))
                            <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $data->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($data->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>


        </div>

    </div>
@endsection
