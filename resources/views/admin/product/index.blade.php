@extends('layouts.admin')

@section('title','Quản lý sản phẩm')

@section('main')
<form action="" method="GET" class="form-inline" role="form">
    <div class="form-group">
        <input name="keyword" class="form-control" style="width:350px" placeholder="Tìm kiếm sản phẩm">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('product.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm mới</a>
</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category_id</th>
            <th>Price</th>
            <th>Status</th>
            <th>Atrribute</th>
            <th>Image</th>

        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->cat->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->status == 0 ? 'Tạm ẩn' : 'Hiển thị' }}</td>
            <td>
                @foreach($product->attr as $item2)
                @if($item2->attr_name->name == 'size')
                <div><b>{{$item2->attr_name->name}}</b>: {{$item2->attr_name->value}}</div>
                @else
                <div>
                    <b>{{$item2->attr_name->name}}</b>:
                    {{$item2->attr_name->value}}
                </div>
                @endif
                @endforeach
            </td>
            <td>
                <img src="{{url('uploads')}}/{{$product->image}}" width="60">
            </td>
            <td class="text-right">
                <form action="{{route('product.destroy', $product->id)}}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger" onclick="return confirm('Chắc chưa?')"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
{{$products->appends(request()->all())->links()}}
@stop()