@extends('layout.site')
@section('title', 'Cart')
@section('content')
    <div class="cart-container">
        <form action="{{ route('site.cart.update') }}" method="post">
            @csrf
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width:40px; height:40px">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalMoney = 0;
                    @endphp
                    @foreach ($list_cart as $row_cart)
                        <tr>
                            <td>{{ $row_cart['id'] }}</td>
                            <td>
                                <img class ="img-fluid" style="width:80px; height:80px"
                                    src="{{ asset('images/products/' . $row_cart['image']) }}" alt="{{ $row_cart['image'] }}">
                            </td>
                            <td>{{ $row_cart['name'] }}</td>
                            <td>
                                <div class="quantity">
                                    <input type="number" name="qty[{{ $row_cart['id'] }}]" value="{{ $row_cart['qty'] }}" min="1">
                                </div>
                            </td>
                            <td>{{ $row_cart['price'] }}</td>
                            <td class="total">{{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                            <td><a href="{{ route('site.cart.delete', ['id' => $row_cart['id']]) }}">Xóa</a></td>
                        </tr>
                        @php
                        $totalMoney += $row_cart['price'] * $row_cart['qty'];
                    @endphp
                @endforeach
                </tbody>

            </table>
            <button type="submit" class="btn btn-primary px-3">Cập nhật</button>
        <div class="total">Tổng tiền là: {{$totalMoney}}đ</div>
    </form>
    </div>
@endsection
