@extends('layout.site')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="product-detail">
        <div class="product-container">
            <img src="{{ asset('images/products/' . $product->image) }}" class="product-image"></img>
            <div class="product-details">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
                <div class="quantity">
                    <label for="qty">Số lượng:</label>
                    <input type="number" id="qty" name="qty" value="1" min="1">
                </div>
                <button onclick="handleAddCart({{ $product->id }})">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>

    <div class="related-products">
        <h2>Sản phẩm liên quan</h2>
        <div class="product-grid">
            <div class="row">
                @foreach ($list_product as $relatedProduct)
                    <div class="product-item">
                        <a href="{{ route('site.product.detail', $relatedProduct->id) }}">
                            <img class="product-image" src="{{ asset('images/products/' . $relatedProduct->image) }}"
                                alt="{{ $relatedProduct->name }}">
                            <h3>{{ $relatedProduct->name }}</h3>
                            <p>
                                <del>{{ number_format($product->price, 0, ',', '.') }}đ</del>
                            </p>
                            <p>Giảm còn: {{ number_format($product->pricesale, 0, ',', '.') }}đ</p>
                        </a>
                        <a href="{{ route('site.product.detail', ['slug' => $relatedProduct->slug]) }}">Chi tiết</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function handleAddCart(productid) {
            let qty = document.getElementById("qty").value;
            $.ajax({
                url: "{{ route('site.cart.addcart') }}",
                type: "GET",
                data: {
                    productid: productid,
                    qty: qty
                },
                success: function(result, status, xhr) {
                    document.getElementById("showqty").innerHTML = result;
                    alert("Thêm vào giỏ hàng thành công");
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            })
        }
    </script>
    </script>
@endsection
