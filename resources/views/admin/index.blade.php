@extends('layouts.admin')
@section('title','Dashboard')
@section('main')
<div class="jumbotron">
    <div class="container">
        <h1>Wellcome, Boss Nam - Lâm - Hưng</h1>
        <p>Admin Project Sem II</p>
        <p>
            <a class="btn btn-primary btn-lg" href="{{ route('home.index') }}">Shop Now</a>
        </p>
    </div>
</div>
@stop()