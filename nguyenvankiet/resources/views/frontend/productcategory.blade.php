@extends('layout.site')
@section('title', 'Sản phẩm theo danh mục')
@section('header')
@endsection
@section('content')

    <section style="margin-top:50px">
        <h2 class="section-title">{{ $row->name }}</h2>
        <!-- Shop Product Start -->
        <div class="row" style="display: flex; margin-left: 10%">
            @foreach ($list_product as $productitem)
                <div class="row ">
                    <div class="col">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{ asset('images/products/' . $productitem->image) }}"
                                    alt="{{ $productitem->image }}">
                            </div>
                            <h3 class="product-name">{{ $productitem->name }}</h3>
                            <p>
                                <del>{{ number_format($product->price, 0, ',', '.') }}đ</del>
                            </p>
                            <p>Giảm còn: {{ number_format($product->pricesale, 0, ',', '.') }}đ</p>
                            <a href="{{ route('site.product.detail', ['slug' => $productitem->slug]) }}"
                                class="btn btn-primary" style="margin-bottom: 5px;">Mua ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>


        <div class="pagination" style="margin-left:-1%; margin-bottom:20px">
            @foreach ($list_product->links()->elements[0] as $page => $url)
                @if ($page == $list_product->currentPage())
                    <a href="{{ $url }}" class="active rounded"
                        id="page-{{ $page }}">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="rounded" id="page-{{ $page }}">{{ $page }}</a>
                @endif
            @endforeach
        </div>



        <!-- Shop Product End -->

        </div>

        </div>
    @endsection
