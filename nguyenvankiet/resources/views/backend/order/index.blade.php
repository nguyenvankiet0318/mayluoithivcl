@extends('layout.admin')
@section('title', 'Order')
@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả Đơn hàng</h1>
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
                        <form action="{{ route('admin.order.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Tên người giao hàng (*)</label>
                                <input type="text" name="delivery_name" id="delivery_name" placeholder="Nhập tên người vận chuyển"
                                    class="form-control" value="{{ old('delivery_name') }}">
                                @error('delivery_name')
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
                                <label>giới tính người vận chuyển (*)</label>
                                <textarea rows="1" name="delivery_gender" id="delivery_gender" placeholder="delivery gender" class="form-control"></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>giới tính người vận chuyển</label>
                                <select name="delivery_gender" class="form-control">
                                    <option value="nam">Nam</option>
                                    <option value="nữ">Nữ</option>
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <label>Email của người vận chuyển (*)</label>
                                <textarea rows="1" name="delivery_email" id="delivery_email" placeholder="delivery's email" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Số điện thoại của người vận chuyển (*)</label>
                                <input type="number" name="delivery_phone" id="delivery_phone" placeholder="delivery's phone" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>địa chỉ của người vận chuyển (*)</label>
                                <textarea rows="1" name="delivery_address" id="delivery_address" placeholder="delivery's address" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Type (*)</label>
                                <textarea rows="1" name="type" id="type" placeholder="type" class="form-control"></textarea>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Note</label>
                                <select name="note" class="form-control">
                                    <option value="Mua tại quầy">Mua tại quầy</option>
                                    <option value="Mua online">Mua online</option>
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <label>Note (*)</label>
                                <textarea rows="1" name="note" id="note" placeholder="note" class="form-control"></textarea>
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
                                        <th>Tên người giao hàng</th>
                                        <th>Số điện thoại người giao hàng</th>
                                        <th>Email của người giao hàng</th>
                                        <th>Địa chỉ người giao hàng</th>
                                        <th>Giới tính người giao hàng</th>

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
                                                    {{ $row->delivery_name }}
                                                </div>
                                            </td>
                                            <td> {{ $row->delivery_phone     }}</td>
                                            <td> {{ $row->delivery_email     }}</td>
                                            <td> {{ $row->delivery_address     }}</td>
                                            <td> {{ $row->delivery_gender     }}</td>

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
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection