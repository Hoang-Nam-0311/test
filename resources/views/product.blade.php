@extends('layouts.master')

@section('title','Danh mục')
@section('main')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1> WATCH</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home.index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Products</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Product Filters</div>
            </div>
            <div class="sidebar-filter mt-50">

                <div class="common-filter">
                    <div class="head">Brands</div>
                    <form action="#">
                        @foreach ($cate as $pod)
                        <?php $count = $pod->products->count() ?>
                        <ul>
                            <li class="filter-list"><input class="pixel-radio category-filter" type="checkbox" value="{{$pod->id}}" data-filter="category" name="category-filter"><label>{{$pod->name}}<span>({{$count}})</span></label></li>
                        </ul>
                        @endforeach
                    </form>
                </div>

                <div class="common-filter">
                    <div class="head">Size</div>
                    @foreach ( $sizes as $value)
                    <form action="">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" id="size" type="checkbox" value="?size={{$value->id}}"><label for="black">{{$value->value}}MM</label></li>
                        </ul>
                    </form>
                    @endforeach
                </div>

                <div class=" common-filter">
                    <div class="head">Wieght</div>
                    @foreach ( $weights as $value)
                    <form action="">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" id="wieght" type="checkbox" value="?weight={{$value->id}}"><label for="black">{{$value->value}}GM</label></li>
                        </ul>
                    </form>
                    @endforeach
                </div>

                <div class="common-filter">
                    <div class="head">Price</div>
                    <div class="price-range-area">
                        <form >
                            <div id="slider-range"></div>
                            <input type="text" id="amount" style="border:0; color:#000000; font-weight:bold;">

                            <input type="hidden" name="start_price" id="start_price">

                            <input type="hidden" name="end_price" id="end_price">
                            <br>
                            <input type="submit" name="filter_price" value="Filter" class="btn btn-sm btn-default">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center ">
                <div class="sorting">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blackColor" class="bi bi-grid" viewBox="0 0 16 16">
                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                    </svg>
                    <span class="routead"></span>
                    <i class="fa-solid fa-list-ul l2"></i>
                </div>
                <div class="sorting mr-auto">
                    <select name="sort" id="sort">
                        <option value="{{Request::url()}}?sort_by=none">Featured</option>
                        <option value="{{Request::url()}}?sort_by=az">Alphabetically, A-Z</option>
                        <option value="{{Request::url()}}?sort_by=za">Alphabetically, Z-A</option>
                        <option value="{{Request::url()}}?sort_by=tang_dan">Price, low to high</option>
                        <option value="{{Request::url()}}?sort_by=giam_dan">Price, high to low</option>
                    </select>
                </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                    @foreach($product as $prod)
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

            <section class="trantion">


            </section>
        </div>
    </div>
</div>

@stop()