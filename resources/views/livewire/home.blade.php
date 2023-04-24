@extends('layouts.master')

@section('title','Danh mục')
@section('main')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>{{$cat->name}} WATCH</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home.index') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">{{$cat->name}}</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
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
                            <li class="filter-list"><input class="pixel-radio" type="checkbox" id="apple"
                                    name="brand" wire:model="search"><label>{{$pod->name}}<span>({{$count}})</span></label></li>
                        </ul>
                        @endforeach
                    </form>
                </div>
                <div class="common-filter">
                    <div class="head">Size</div>
                    <form action="#">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" type="checkbox" id="black"
                                    name="color"><label for="black">39MM</label></li>
                            <li class="filter-list"><input class="pixel-radio" type="checkbox" id="balckleather"
                                    name="color"><label for="balckleather">40MM</label></li>
                            <li class="filter-list"><input class="pixel-radio" type="checkbox" id="blackred"
                                    name="color"><label for="blackred">36MM</label></li>
                        </ul>
                    </form>
                </div>

                <div class="common-filter">
                    <div class="head">Wieght</div>
                    <form action="#">
                        <ul>
                            <li class="filter-list"><input class="pixel-radio" type="checkbox" id="black"
                                    name="color"><label for="black">58.5GM</label></li>
                            <li class="filter-list"><input class="pixel-radio" type="checkbox" id="balckleather"
                                    name="color"><label for="balckleather">48.9GM</label></li>
                        </ul>
                    </form>
                </div>

                <div class="common-filter">
                    <div class="head">Price</div>
                    <div class="price-range-area">
                        <div id="price-range"></div>
                        <div class="value-wrapper d-flex">
                            <div class="price">Price:</div>
                            <span>$</span>
                            <div id="lower-value"></div>
                            <div class="to">to</div>
                            <span>$</span>
                            <div id="upper-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center ">
                <div class="sorting">
                    <select>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                {{-- <div class="pagination">
                    <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div> --}}
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                    @foreach($products as $prod)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{url('uploads')}}/{{$prod->image}}" alt="">
                            <div class="product-details">
                                <h6>{{$prod->name}}</h6>
                                <div class="price">
                                    <h6>${{$prod->price}}</h6>
                                    <!-- <h6 class="l-through">${{number_format($prod->price)}}</h6> -->
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
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">

                <div class="pagination">
                    <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

@stop()