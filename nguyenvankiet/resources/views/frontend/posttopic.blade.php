@extends('layout.site')
@section('title', 'Post theo topic')
@section('content')

<section class="all-posts-section">
    <div class="col">
    <h2 class="section-title">{{$row->name}}</h2>
    <div class="row">
        @foreach ( $list_post as $postitem )
        <div class="post-item">
            <div class="post-image" style="justify-content: center; display:flex;">
            <img src="{{ asset('images/posts/' . $postitem->image) }}" ></img>
        </div>
          <h3 class="post-title">{{ $postitem->title }}</h3>
          <p class="post-date">{{ $postitem->created_at }}</p>
          <p class="post-excerpt">{{ $postitem->detail }}</p>
          <a href="{{ route('site.post.detail', ['slug' => $postitem->slug]) }}" class="read-more">chi tiết</a>
        </div>
        @endforeach
    </div>

    </div>
    <div class="pagination" style="margin-left: -3%">
        @foreach ($list_post->links()->elements[0] as $page => $url)
            @if ($page == $list_post->currentPage())
                <a href="{{ $url }}" class="active rounded"
                    id="page-{{ $page }}">{{ $page }}</a>
            @else
                <a href="{{ $url }}" class="rounded"
                    id="page-{{ $page }}">{{ $page }}</a>
            @endif
        @endforeach
    </div>
</section>
@endsection
