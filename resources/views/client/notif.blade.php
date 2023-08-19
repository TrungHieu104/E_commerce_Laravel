@extends('client.layout')

@section('title')
    - Notif
@endsection

@section('content')
<style>
    .mt{
        margin-top: 50px
    }
</style>
    <div class="w-25 mx-auto alert alert-info text-center mt">
        @if (Session::exists('thongbao'))
            <h4>{{ Session::get('thongbao') }}</h4>
            <hr>
            <a href="/">Back to home</a>
        @endif
    </div>
@endsection
