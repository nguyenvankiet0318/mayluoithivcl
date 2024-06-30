<section class="products-section">
    <div class="container">
        <h2 class="section-title">New Products</h2>
        <div class="row justify-content-center" style="display: flex; margin-left: 13%">

            @foreach ($list->take(6) as $product)
                <div class="row ">
                    <div class="col">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->image }}">
                            </div>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p>
                                <del>{{ number_format($product->price, 0, ',', '.') }}đ</del>
                            </p>
                            <p>Giảm còn: {{ number_format($product->pricesale, 0, ',', '.') }}đ</p>
                            <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
                                class="btn btn-primary" style="margin-bottom: 5px;">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
