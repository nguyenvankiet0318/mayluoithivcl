@extends('layout.site')
@section('title', 'Trang tìm kiếm')

@section('content')
    <main>
        <section class="products-section">
            <div class="container">
                <h2 class="section-title">Kết quả tương ứng với {{ $search }}</h2>
                <div class="row justify-content-center" style="display: flex; margin-left: 13%">
                    @forelse ($list_product as $product)
                        <div class="row ">
                            <div class="col">
                                <div class="product-item">
                                    <div class="product-image">
                                        <img src="{{ asset('images/products/' . $product->image) }}"
                                            alt="{{ $product->image }}">
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

                    @empty
                        <div class="col">
                            <p>Không tìm thấy sản phẩm nào phù hợp.</p>
                        </div>
                    @endforelse
                </div>
                <div class="pagination" style="margin-left:-1%; margin-bottom:20px">
                    @foreach ($list_product->links()->elements[0] as $page => $url)
                        @if ($page == $list_product->currentPage())
                            <a href="{{ $url }}" class="active rounded"
                                id="page-{{ $page }}">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="rounded"
                                id="page-{{ $page }}">{{ $page }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            </div>
            </div>
    </main>
@endsection
