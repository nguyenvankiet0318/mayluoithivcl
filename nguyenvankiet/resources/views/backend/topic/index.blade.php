@extends('layout.admin')
@section('title', 'Topic')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bảng topic</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Bảng topic</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        {{-- <a href="#" class="btn btn-sm btn-success">
              <i class="fa fa-plus" aria-hidden="true"></i>Thêm
            </a> --}}
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                      {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif --}}
                        <form action="{{ route('admin.topic.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Tên topic</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="3" class="form-control">
                                {{ old('description') }}
                              </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">Chọn vị trí</option>
                                    {!! $htmlsortorder !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Thêm topic
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-hover table-stripes">
                            <theader>
                                <tr>
                                    <th class="text-center" style="width:30px">#</th>
                                    <th>Tên topic</th>
                                    <th>Slug</th>
                                    <th class="text-center" style="width:190px">Chức năng</th>
                                    <th class="text-center" style="width:30px">ID</th>
                                </tr>
                            </theader>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <th class="text-center">
                                            <input type="checkbox">
                                        </th>
                                        <th class="text-center">
                                            <img src="{{ asset('assets/images/categorys/' . $row->image) }}"
                                                class="img-fluid" alt="{{ $row->image }}">
                                        </th>
                                        <th>{{ $row->name }}</th>
                                        <th>{{ $row->slug }}</th>
                                        <th class="text-center">
                                            <a href="#" class="btn btn-sm btn-success">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.topic.show', ['id' => $row->id]) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>

                                        </th>
                                        <th class="text-center">{{ $row->id }}</th>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
