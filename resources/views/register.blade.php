@extends('layouts.master')

@section('title', 'Đăng Kí')
@section('main')

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ url('') }}/assets/img/banner/banner-01.webp" alt="">
                    <div class="hover">
                        <h4>Register for become customer</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this
                            is the</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Register</h3>

                    <form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="name" placeholder="Username"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'"
                                value="{{ old('name') }}">
                            @error('name')
                            <span style="color:red; float:left">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"
                                value="{{ old('email') }}">
                            @error('email')
                            <span style="color:red; float:left">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'"
                                value="{{ old('phone') }}">
                            @error('phone')
                            <span style="color:red; float:left">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            @error('password')
                            <span style="color:red; float:left">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-check">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'"
                                value="{{ old('address') }}">
                            @error('address')
                            <span style="color:red; float:left">{{ $message }}</span>
                            @enderror
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
    </div>
</section>

@stop()