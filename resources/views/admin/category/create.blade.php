@extends('layouts.admin')

@section('title','Quản lý danh mục')

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
        <label for="">trạng thái danh mục</label>
        
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0">
                Tạm ẩn
            </label>
        </div>
        
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()