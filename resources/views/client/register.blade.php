@extends('client.layout')

@section('title')
    - Register
@endsection

@section('content')
    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Register</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    {{-- <li><a href="shop-grid-sidebar-left.html">Shop</a></li> --}}
                                    <li class="active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">

                <!--register area start-->
                <div class="col-lg-6 mx-auto col-md-6">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        @if (Session::exists('thongbao'))
                            <h6 class="alert alert-info text-center"> {{ Session::get('thongbao') }} </h6>
                        @endif
                        <h3>Register</h3>
                        <form action="{{ url('/register') }}" method="post" class="row"> @csrf
                            <div class="col-lg-6 mx-auto col-md-6">

                                <div class="default-form-box">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lName" value="{{old('lName')}}">
                                    <span class="text-danger"> @error('lName')
                                        {{ $message }}
                                    @enderror </span>
                                </div>
                                <div class="default-form-box">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fName" value="{{old('fName')}}">
                                    <span class="text-danger"> @error('fName')
                                        {{ $message }}
                                    @enderror </span>
                                    
                                </div>
                                <div class="default-form-box">
                                    <label>Phone </label>
                                    <input type="number" name="phone" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mx-auto col-md-6">

                                <div class="default-form-box">
                                    <label>Email address <span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{old('email')}}">
                                    <span class="text-danger"> @error('email')
                                        {{ $message }}
                                    @enderror </span>
                                </div>
                                <div class="default-form-box">
                                    <label>Passwords <span class="text-danger">*</span></label>
                                    <input type="password" name="password" value="{{old('password')}}">
                                    <span class="text-danger"> @error('password')
                                        {{ $message }}
                                    @enderror </span>
                                </div>
                                <div class="default-form-box">
                                    <label>Re-Passwords <span class="text-danger">*</span></label>
                                    <input type="password" name="repass" value="{{old('repass')}}">
                                    <span class="text-danger"> @error('repass')
                                        {{ $message }}
                                    @enderror </span>
                                </div>
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover" type="submit">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
@endsection
