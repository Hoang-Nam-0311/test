@extends('layouts.admin')

@section('title','Quản lý')

@section('main')

<form action="" method="POST" role="form">
    @csrf
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Input field">
        @error('name')
        <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Tên thuộc tính</label>
        <input type="text" class="form-control" name="value" placeholder="Input field">
        @error('name')
        <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>


    <div class="form-group">
        <label for="">Description</label>
        <input type="text" name="description" class="form-control" placeholder="">

    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()