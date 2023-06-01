@extends('layouts.master')

@section('title','Search sản phẩm')
@section('main')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1> WATCHES</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home.index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Products</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container">
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                    @foreach($search_product as $prod)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{url('uploads')}}/{{$prod->image}}" alt="">
                            <div class="product-details">
                                <h6>{{$prod->name}}</h6>
                                <div class="price">
                                    <h6>£{{$prod->price}}</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="{{route('cart.add', $prod->id)}}" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="{{route('home.productDetail', $prod->id)}}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </section>
            <section class="trantion"></section>
        </div>
    </div>
</div>

@stop()