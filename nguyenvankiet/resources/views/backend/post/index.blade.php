@extends('layout.admin')
@section('title', 'Post')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả bài Post</h1>
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
                        Thêm Post
                    </button>
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm vào thùng rác
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                     <div class="col-md-4">
                        <form action="{{ route('admin.post.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Tên Post (*)</label>
                                <input type="text" name="title" id="title" placeholder="Nhập tiêu đề"
                                    class="form-control" value="{{ old('title') }}">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
    <label>Topic (*)</label>
    <select name="topic_id" class="form-control">
        <option value="">Chọn Topic</option>
        @foreach($topics as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
                                <label>Chi tiết (*)</label>
                                <textarea rows="3" name="detail" id="detail" placeholder="Nhập chi tiết sản phẩm" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Slug (*)</label>
                                <textarea rows="3" name="slug" id="slug" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mô tả (*)</label>
                                <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Định dạng</label>
                                <select name="type" class="form-control">
                                    <option value="page">Trang</option>
                                    <option value="post">Bài</option>
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
                                        <th>Tên danh mục</th>
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
                                                <img src="../public/images/category.jpg" alt="category.jpg">
                                            </td>
                                            <td>
                                                <div class="title">
                                                    {{ $row->title }}
                                                </div>
                                            </td>
                                            <td> {{ $row->slug }}</td>
                                            <td>
                                                <div class="function_style">
                                                    <button class="bg-success">
                                                        <i class="fa fa-solid fa-eye "></i>
                                                    </button>
                                                    {{-- <button>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button> --}}
                                                    <button class="bg-primary">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="bg-danger">
                                                        <i class="fa fa-solid fa-trash "></i>
                                                    </button>
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