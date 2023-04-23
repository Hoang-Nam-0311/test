@extends('layouts.master')

@section('title','Đăng Kí')
@section('main')

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{url('')}}/assets/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>Register for become customer</h4>
                        <p>Become customer just by register an account</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Register</h3>
                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        @csrf

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="number" class="form-control" name="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        <div class="form-check">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="radio" name="gender" value="1" checked>
                                <label for="f-option2">Male</label>
                            </div>
                            <div class="creat_account">
                                <input type="radio" name="gender" value="0">
                                <label for="f-option2">Female</label>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Register</button>
                            <a href="#">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop()