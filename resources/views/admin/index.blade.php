@extends('layouts.admin')
@section('title','Dashboard')
@section('main')
<div class="jumbotron">
    <div class="container">
        <h1>Wellcome , Boss Nam-Lâm-Hưng</h1>
        <p>Team no 1</p>
        <p>
            <a class="btn btn-primary btn-lg" href="{{ route('home.index') }}">Learn more</a>
        </p>
    </div>
</div>
@stop()