@extends('client.layout')

@section('title')
    - Cart
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
                        <h3 class="breadcrumb-title">Cart</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        @php
                                            $tongtien = 0;
                                            $tongsoluong = 0;
                                            foreach ($cart as $c) {
                                                $id_sp = $c['id_sp'];
                                                $soluong = $c['soluong'];
                                                $ten_sp = \DB::table('sanpham')
                                                    ->where('id_sp', '=', $id_sp)
                                                    ->value('ten_sp');
                                                $gia = \DB::table('sanpham')
                                                    ->where('id_sp', '=', $id_sp)
                                                    ->value('gia');
                                                $hinh = \DB::table('sanpham')
                                                    ->where('id_sp', '=', $id_sp)
                                                    ->value('hinh');
                                                echo var_dump($gia);
                                                echo var_dump($id_sp);
                                                echo var_dump($soluong);
                                                echo var_dump($ten_sp);
                                            
                                                $thanhtien = $gia * $soluong;
                                                $tongtien += $thanhtien;
                                                $tongsoluong += $soluong;
                                                $thanhtien = number_format($thanhtien, 0, ',', '.');
                                                $gia = number_format($gia, 0, ',', '.');
                                                echo "
                                                        <tr>
                                                            <td class='product_remove'> 
                                                                <a href='/delProductInCart/{$id_sp}'><i class='fa fa-trash-o'></i></a> 
                                                            </td>
                                                            <td class='product_name'><a href=''>{$ten_sp}</a> </td>
                                                            <td class='product_thumb'><img style='width:auto;' src='{$hinh}'> </td>
                                                            <td class='product-price'> {$gia} </td>
                                                            <td class='product_quantity'><input type='number' value='{$soluong}' >
                                                            </td>
                                                            <td class='product_total'> {$thanhtien}</td>
                                                        </tr>
                                                    ";
                                            }
                                        @endphp
                                        <tr>
                                            <td class="product_remove">
                                                <a href="/deleteAllCart">
                                                    <button class="btn btn-md btn-golden" type="submit">
                                                        <i class="fa fa-trash-o"></i>
                                                        Delete Cart
                                                    </button>
                                                </a>
                                            </td>
                                            <td colspan="4">
                                                <h5>
                                                    Total:
                                                </h5>
                                            </td>

                                            <td class="product_total">
                                                <h6>
                                                    {{ number_format($tongtien, 0, ',', '.') }}
                                                </h6>
                                            </td>
                                        </tr>
                                        <!-- End Cart Single Item-->
                                    </tbody>

                                </table>
                            </div>
                            <div class="cart_submit">
                                <input type="button" class="btn btn-md btn-golden" style="width:14%" onclick="history.go(0)"  value="update cart"/>
                                {{-- <button class="btn btn-md btn-golden" type="submit">update cart</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">{{ number_format($tongtien, 0, ',', '.') }}</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $00</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">{{ number_format($tongtien, 0, ',', '.') }}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
@endsection
