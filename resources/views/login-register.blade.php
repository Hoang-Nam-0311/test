@extends('layouts.master')

@section('title', 'Login')
@section('main')

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="{{ url('') }}/assets/img/banner/banner-01.webp" alt="">
					<div class="hover">
						<h4>You dont have account?</h4>
						<p>Create an account to use many useful features :></p>
						<a class="primary-btn" href="{{ route('home.register') }}">Create Account NOW</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Log in to enter</h3>
					<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
						@csrf

						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							@error('email')
							<span style="color:red; float:left">{{ $message }}</span>
							@enderror
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							@error('password')
							<span style="color:red; float:left">{{ $message }}</span>
							@enderror
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Log In</button>
							<a href="#">Forgot Password?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->
@stop()