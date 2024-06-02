@extends('layout.admin')
@section('name', 'Contact')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả</h1>
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
                        Thêm Liên hệ
                    </button>
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm vào thùng rác
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                     <div class="col-md-4">
                        <form action="{{ route('admin.contact.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Tên liên hệ (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tiêu đề"
                                    class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
    <label>User (*)</label>
    <select name="user_id" class="form-control">
        <option value="">Chọn User</option>
        @foreach($users as $id => $name)
        <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
                                <label>Title (*)</label>
                                <textarea rows="3" name="title" id="title" placeholder="Nhập title" class="form-control"></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Password (*)</label>
                                <input type="password" name="password" id="password" placeholder="Nhập password" class="form-control"></input   >
                            </div> -->
                            <div class="mb-3">
                                <label>Phone (*)</label>
                                <textarea rows="3" name="phone" id="phone" placeholder="Nhập số điện thoại" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Email (*)</label>
                                <textarea rows="3" name="email" id="email" placeholder="Nhập Email" class="form-control"></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Định dạng</label>
                                <select name="type" class="form-control">
                                    <option value="page">Trang</option>
                                    <option value="post">Bài</option>
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <label>Hình</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <!-- <div class="mb-3">
                                <label>Mô tả (*)</label>
                                <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                            </div> -->
                            <div class="mb-3">
                                <label>Content (*)</label>
                                <textarea rows="3" name="content" id="descricontentption" placeholder="Nhập content của contact" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Replay Id (*)</label>
                                <input type="number" name="replay_id" id="replay_id" placeholder="Nhập replay id" class="form-control"></input>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Định dạng</label>
                                <select name="type" class="form-control">
                                    <option value="page">Trang</option>
                                    <option value="post">Bài</option>
                                </select>
                            </div> -->
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
                                                <div class="name">
                                                    {{ $row->name }}
                                                </div>
                                            </td>
                                            <td> {{ $row->phone }}</td>
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