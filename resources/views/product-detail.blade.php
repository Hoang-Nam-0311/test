@extends('layouts.master')

@section('title','Chi tiết sản phẩm')
@section('main')




<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Constellation</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{route('home.index')}}">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{route('home.category', $product->cat->id)}}">{{$product->cat->name}}<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">{{$product->name}}</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{url('uploads')}}/{{$product->image}}" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{url('uploads')}}/{{$product->image}}" alt="">
                    </div>
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{url('uploads')}}/{{$product->image}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$product->name}}</h3>
                    <div class="nam">
                        <h2>£{{$product->price}}.00</h2>
                        <h4>(12 month warranty)</h4>
                    </div>


                    <ul class="list">
                        <li><a class="active" href="{{route('home.category', $product->cat->id)}}"><span>Brands</span>
                                : {{$product->cat->name}}</a></li>
                        <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                    </ul>
                    <p style="margin-top:20px;"> {{$product->content}}</p>
                    <hr>
                    <h3>SPECIFICATIONS</h3>
                    <div class="swatch" data-option-index="0">
                        <div class="weight ">
                            <label for="">Weight</label>
                            <div class="buttonfil1 available">
                                <button type="button" class="btn btn-outline-primary">58.5 GM</button>
                                <button type="button" class="btn btn-outline-primary">48.9 GM</button>
                            </div>
                        </div>


                        <div class="size">
                            <label for="">Size</label>
                            <div class="buttonfil2 available">
                                <button type="button" class="btn btn-outline-primary">40 MM</button>
                                <button type="button" class="btn btn-outline-primary">36 MM</button>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <div class="review">
                        <label for="">NO REVIEWS</label>
                        <div class="star">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>

                        <div class="viewsize">
                            <i class="fa fa-book" aria-hidden="true" data-toggle="modal" data-target="#exampleModal"></i>
                            <label for="" data-toggle="modal" data-target="#exampleModal">SIZEGUIDE</label>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="table-size">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">SIZE GUIDE</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <p>This is an approximate conversion table to help you find your size.</p>

                                            <div class="modal-body">

                                                <table class="table-modal-info">
                                                    <thead>
                                                        <tr style="background: #f7f8fa;">
                                                            <th>Italian</th>
                                                            <th>Spanish</th>
                                                            <th>German</th>
                                                            <th>UK</th>
                                                            <th>US</th>
                                                            <th>Japanese</th>
                                                            <th>Chinese</th>
                                                            <th>Russian</th>
                                                            <th>Korean</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>34</td>
                                                            <td>30</td>
                                                            <td>28</td>
                                                            <td>4</td>
                                                            <td>00</td>
                                                            <td>3</td>
                                                            <td>155/75A</td>
                                                            <td>36</td>
                                                            <td>44</td>
                                                        </tr>
                                                        <tr>
                                                            <td>36</td>
                                                            <td>32</td>
                                                            <td>30</td>
                                                            <td>6</td>
                                                            <td>0</td>
                                                            <td>5</td>
                                                            <td>155/80A</td>
                                                            <td>38</td>
                                                            <td>44</td>
                                                        </tr>
                                                        <tr>
                                                            <td>38</td>
                                                            <td>34</td>
                                                            <td>32</td>
                                                            <td>8</td>
                                                            <td>2</td>
                                                            <td>7</td>
                                                            <td>160/84A</td>
                                                            <td>40</td>
                                                            <td>55</td>
                                                        </tr>
                                                        <tr>
                                                            <td>40</td>
                                                            <td>36</td>
                                                            <td>34</td>
                                                            <td>10</td>
                                                            <td>4</td>
                                                            <td>9</td>
                                                            <td>165/88A</td>
                                                            <td>42</td>
                                                            <td>55</td>
                                                        </tr>
                                                        <tr>
                                                            <td>42</td>
                                                            <td>38</td>
                                                            <td>36</td>
                                                            <td>12</td>
                                                            <td>6</td>
                                                            <td>11</td>
                                                            <td>170/92A</td>
                                                            <td>44</td>
                                                            <td>66</td>
                                                        </tr>
                                                        <tr>
                                                            <td>44</td>
                                                            <td>40</td>
                                                            <td>38</td>
                                                            <td>14</td>
                                                            <td>8</td>
                                                            <td>13</td>
                                                            <td>175/96A</td>
                                                            <td>46</td>
                                                            <td>66</td>
                                                        </tr>
                                                        <tr>
                                                            <td>46</td>
                                                            <td>42</td>
                                                            <td>40</td>
                                                            <td>16</td>
                                                            <td>10</td>
                                                            <td>15</td>
                                                            <td>170/98A</td>
                                                            <td>48</td>
                                                            <td>77</td>
                                                        </tr>
                                                        <tr>
                                                            <td>48</td>
                                                            <td>44</td>
                                                            <td>42</td>
                                                            <td>18</td>
                                                            <td>12</td>
                                                            <td>17</td>
                                                            <td>170/100B</td>
                                                            <td>50</td>
                                                            <td>77</td>
                                                        </tr>
                                                        <tr>
                                                            <td>50</td>
                                                            <td>46</td>
                                                            <td>44</td>
                                                            <td>20</td>
                                                            <td>14</td>
                                                            <td>19</td>
                                                            <td>175/100B</td>
                                                            <td>52</td>
                                                            <td>88</td>
                                                        </tr>
                                                        <tr>
                                                            <td>52</td>
                                                            <td>48</td>
                                                            <td>46</td>
                                                            <td>22</td>
                                                            <td>16</td>
                                                            <td>21</td>
                                                            <td>180/104B</td>
                                                            <td>54</td>
                                                            <td>88</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card_area d-flex align-items-center">
                        <div class="product_count">

                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )  &sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                        </div>
                        <a class="primary-btn" href="{{route('cart.add', $product->id)}}">Add to Cart</a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of
                    all shapes
                    and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick
                    School in
                    Reading at the age of 15, where she went to secretarial school and then into an insurance office.
                    After moving to
                    London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He
                    was an
                    officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before
                    John took a
                    job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours,
                    and when
                    showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently
                    bought her a
                    child’s painting set for her birthday and it was with this that she produced her first significant
                    work, a
                    half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It
                    was aptly
                    named ‘Hangover’ by Beryl’s husband and</p>
                <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are
                    seeing
                    more and more recipe books and Internet websites that are dedicated to the act of cooking for one.
                    Divorce and
                    the death of spouses or grown children leaving for college are all reasons that someone accustomed
                    to cooking for
                    more than one would suddenly need to learn how to adjust all the cooking practices utilized before
                    into a
                    streamlined plan of cooking that is more efficient for one person creating less</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Nguyễn Hoàng Nam</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Xời sản phẩm quá tuyệt vời quá xuất sắc tôi hứa sẽ mua lần thứ 2</p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-2.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Phan Trần Bảo Lâm</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Không có chỗ nào bán rẻ như này luôn úi trời ơi quá tuyệt vời</p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-3.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Phạm QUốc Hưng</h4>
                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>Vừa đẹp mà lại vừa rẻ quá tuyệt vời luôn có đánh giá 10 sao tôi cũng đánh giá ấy chứ
                                    lị</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Overall</h5>
                                    <h4>4.0</h4>
                                    <h6>(03 Reviews)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Based on 3 Reviews</h3>
                                    <ul class="list">
                                        <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-1.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Hoàng Nam</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>Xời sản phẩm quá tuyệt vời quá xuất sắc tôi hứa sẽ mua lần thứ 2</p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-2.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Hữu Bách</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>Sản phẩm này xứng đáng 10 điểm luôn 100 điểm 1000 điểm cũng vẫn xứng con nhà bà đáng.
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/review-3.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Mạnh Cường</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>Vừa đẹp mà lại vừa rẻ quá tuyệt vời luôn có đánh giá 10 sao tôi cũng đánh giá ấy chứ
                                    lị</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <ul class="list">
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <p>Outstanding</p>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="primary-btn">Submit Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->
<!-- <script>
    // const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$(".tab-item");
    const tabss = $$(".tab-item1");


    tabs.forEach((tab, index) => {
        tab.onclick = function() {
            this.classList.add("active");

        }
    })
    



    console.log(tabs);
</script> -->

@stop()