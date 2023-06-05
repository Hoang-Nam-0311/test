@extends('layouts.master')

@section('title','Giỏ Hàng')
@section('main')


<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home.index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <form action="{{route('cart.updateAll')}}" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $item)

                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{url('uploads')}}/{{$item->cart->image}}" alt="" width="160" height="160">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$item->cart->name}}</p>
                                            <div class="">
                                                <select class="form-select form-select-lg" name="attr_id[]" style="padding-top: 0; padding-bottom: 0; font-size: 18px;">
                                                    @foreach($item->cart->product_attris as $size)
                                                    @if($size->name == 'size')
                                                    <p>Size:</p>
                                                    <option value="{{$size->id}}" {{$item->cart_attr->contains('id', $size->id) ? 'selected' : ''}}>
                                                        {{$size->value}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <p name=""></p>
                                            <div class="">
                                                <select class="form-select form-select-lg" name="attr_id[]" style="padding-top: 0; padding-bottom: 0; font-size: 18px;">
                                                    @foreach($item->cart->product_attris as $weight)
                                                    @if($weight->name == 'wieght')
                                                    <option value="{{$weight->id}}" {{$item->cart_attr->contains('id', $weight->id) ? 'selected' : ''}}>
                                                        {{$weight->value}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>




                                    </div>
                                </td>
                                <td>
                                    <h5>£{{$item->cart->price}}</h5>
                                </td>
                                <td>
                                    <form action="{{route('cart.update_quantity', $item->id)}}" method="post" id="form{{$item->id}}">
                                        @csrf
                                        <div class="product_count">
                                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                            <input type="text" name="quantity[]" value="{{$item->quantity}}" class="input-text qty" id="quantity{{$item->id}}">
                                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <h5>£{{$item->total_price}}</h5>
                                </td>



                                <td>
                                    <a href="{{route('cart.delete', $item->id)}}" onclick="return confirm('Are you ok ?')" style="color: #111;"><i class="fa-solid fa-xmark"></i></a>
                                </td>
                            </tr>
                            @endforeach


                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="{{route('home.product')}}">Continue shopping</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>£{{$subTotal}}</h5>
                                </td>
                            </tr>

                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>


                                    </div>
                                </td>
                            </tr>

                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="{{route('home.index')}}">
                                            <- Home</a>
                                                <a class="primary-btn" href="{{route('home.checkout')}}">Proceed to
                                                    checkout</a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

@stop()