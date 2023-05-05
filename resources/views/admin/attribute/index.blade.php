@extends('layouts.admin')

@section('title','Quản lý ')

@section('main')

<form action="" method="GET" class="form-inline" role="form">

    <div class="form-group">
        <input name="keyword" class="form-control" style="width:350px" placeholder="Tìm kiếm danh mục">
    </div>



    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('attribute.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm mới</a>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attri as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->status == 0 ? 'Tạm ẩn' : 'Hiển thị' }}</td>
            <td>{{ $cat->value }}</td>
            <td>
                <form action="{{route('attribute.delete', $cat->id)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('attribute.edit', $cat->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger" onclick="return confirm('Chắc chưa?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
@stop()