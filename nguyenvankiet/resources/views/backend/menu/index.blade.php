@extends('layout.admin')
@section('title', 'Menu')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả Menu</h1>
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
                        Thêm menu
                    </button>
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm vào thùng rác
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                     <div class="col-md-4">
                        <form action="{{ route('admin.menu.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Tên Menu (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                    class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Menu cha (*)</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    {!! $htmlparentId !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Link (*)</label>
                                <textarea rows="3" name="link" id="link" placeholder="Nhập link" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>type (*)</label>
                                <textarea rows="1" name="type" id="type" placeholder="Type" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Table Id (*)</label>
                                <input type="number" name="table_id" id="table_id" placeholder="table id" class="form-control"></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div> -->
                            <div class="mb-3">
                                <label>Sắp xếp</label>
                                <select name="sort_order" class="form-control">
                                    <option value="0">Chọn vị trí</option>
                                    {!! $htmlsortOrder!!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Vị trí</label>
                                <select name="position" class="form-control">
                                    <option value="mainmenu">Main menu</option>
                                    <option value="footermenu">Footer menu</option>
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
                                        <th>Tên menu</th>
                                        <th>Vị trí</th>
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
                                            <td> {{ $row->position }}</td>
                                            <td>
                                                <div class="function_style">
                                                @php
                                                    $agrs=['id' => $row->id]
                                                @endphp
                                                    <a href="{{ route('admin.menu.show', $agrs) }}" class="bg-success">
                                                        <i class="fa fa-solid fa-eye "></i>
</a>
                                                    {{-- <button>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button> --}}
                                                    <a href="{{ route('admin.menu.edit', $agrs) }}"  class="bg-primary">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="{{ route('admin.menu.delete', $agrs) }}" class="bg-danger">
                                                        <i class="fa fa-solid fa-trash "></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection