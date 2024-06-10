@extends('layout.admin')
@section('title', 'User')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Tất cả User</h1>
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
                        Thêm User
                    </button>
                    <button class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm vào thùng rác
                    </button>
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Tên User (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                    class="form-control" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>User name (*)</label>
                                <textarea rows="1" name="username" id="username" placeholder="Nhập username" class="form-control"> {{ old('username', $user->username) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>password (*)</label>
                                <input type="password" name="password" id="password" placeholder="Nhập password" class="form-control" value={{ old('password', $user->password) }}></input>
                            </div>
                            <div class="mb-3">
                                <label>Giới tính</label>
                                <select name="gender" class="form-control">
                                <option value="{{ $user->gender }}">{{ old('gender', $user->gender) }}</option>
                                    <option value="Nam" {{($user->gender=="Nam")?'selected':''}}>Nam</option>
                                    <option value="Nữ" {{($user->gender=="Nữ")?'selected':''}}>Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Số điện thoại (*)</label>
                                <input type="number" name="phone" id="phone" placeholder="Số điện thoại" class="form-control" value={{ old('phone', $user->phone) }}></input>
                            </div>
                            <div class="mb-3">
                                <label>Email (*)</label>
                                <textarea rows="1" name="email" id="email" placeholder="Nhập email  " class="form-control">{{ old('email', $user->email) }}</textarea>
                            </div>             
                            <div class="mb-3">
                                <label>Vai trò</label>
                                <select name="roles" class="form-control">
                                    <option value="Admin" {{($user->roles=="admin")?'selected':''}}>Admin</option>
                                    <option value="Customer" {{($user->roles=="customer")?'selected':''}}>Customer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset('images/users/'.$user->image)}}" style="width:90px" alt="{{ $user->image }}">
                            </div>
                            <div class="mb-3">
                                <label>Địa chỉ (*)</label>
                                <textarea rows="1" name="address" id="address" placeholder="Nhập địa chỉ" class="form-control">{{ old('address', $user->address) }}</textarea>
                            </div>   
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{($user->status==1)?'selected':''}}>Xuất bản</option>
                                    <option value="2" {{($user->status==2)?'selected':''}}>Chưa xuất bản</option>
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
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection