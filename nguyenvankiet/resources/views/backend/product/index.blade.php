@extends('layout.admin')
@section('title', 'Product')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả Sản Phẩm</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-solid fa-plus"></i>
                        Thêm sản phẩm
                    </button>
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm vào thùng rác
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                     <div class="col-md-4">
                        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Tên danh mục (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                    class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
    <label>Danh mục cha (*)</label>
    <select name="category_id" class="form-control">
        <option value="">Chọn danh mục</option>
        @foreach($categories as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
                                <label>Chi tiết (*)</label>
                                <textarea rows="3" name="detail" id="detail" placeholder="Nhập chi tiết sản phẩm" class="form-control" >{{ old('detail') }}</textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Slug (*)</label>
                                <textarea rows="3" name="slug" id="slug" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                            </div> -->
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mô tả (*)</label>
                                <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control" >{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Giá tiền (*)</label>
                                <input type="number" name="price" id="price" placeholder="Nhập giá tiền" class="form-control" >{{ old('price') }}</input>
                            </div>
                            <div class="mb-3">
                                <label>Giá sau khi được giảm (*)</label>
                                <input type="number" name="pricesale" id="pricesale" placeholder="Nhập giá tiền" class="form-control" >{{ old('pricesale') }}</input>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div> -->
                         <div class="mb-3">
    <label>Thương Hiệu (*)</label>
    <select name="brand_id" class="form-control">
        <option value="">Chọn thương hiệu</option>
        @foreach($brands as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                            <div class="card-header text-right">
                                <button class="btn btn-sm btn-success">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    Lưu
                                </button>
                            </div>
                        </form>
                    </div>          
                    <div class="col-md-8">
                            <table class="table table-bordered">
            <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px;">
                                            <input type="checkbox">
                                        </th>
                                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Slug</th>
                                        <th>Miêu tả</th>
                                        <th>Giá gốc</th>
                                        <th>Giá giảm</th>
                                        <th>Tên slug</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr class="datarow">
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>
                                                <!-- {{ $row->image }} -->
                                            <img src="{{asset('images/products/'.$row->image)}}" style="width:300px" alt="{{ $row->image }}">
                                            </td>
                                            <td>
                                                <div class="name">
                                                    {{ $row->name }}
                                                </div>
                                            </td>
                                            <td> {{ $row->slug }}</td>
                                            <td> {{ $row->description }}</td>
                                            <td> {{ $row->price }}</td>
                                            <td> {{ $row->pricesale }}</td>
                                            <td>
                                            @php
                                                    $agrs=['id' => $row->id]
                                                @endphp
                                                <div class="function_style">
                                                    <a href="{{ route('admin.product.show', $agrs)}}" class="bg-success">
                                                        <i class="fa fa-solid fa-eye "></i>
                                                    </a>
                                                    {{-- <a>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a> --}}
                                                    <a href="{{ route('admin.product.edit', $agrs)}}" class="bg-primary">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ route('admin.product.delete', $agrs)}}" class="bg-danger">
                                                        <i class="fa fa-solid fa-trash "></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>              
        </section>
    </div>

@endsection