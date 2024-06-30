@extends('layout.site')
@section('title', 'Chi tiết bài viết')
@section('content')

<div class="blog-post-container">
    <div class="blog-post-header">
      <h1 class="blog-post-title">{{$post->title}}</h1>
      <div class="blog-post-meta">
        <span class="blog-post-date">{{$post->created_at}}</span>
      </div>
    </div>
    <div class="blog-post-content">
      <p>{{$post->detail}}</p>
      <div class="post-image" style="display: flex;  align-items: center;justify-content: center;">
      <img  src="{{ asset('images/posts/' . $post->image) }}"></img>
    </div>
    </div>
    <div class="blog-post-footer">
      <div class="blog-post-share">
        <a href="#" class="blog-post-share-link">Chia sẻ</a>
      </div>
    </div>
  </div>

  <div class="related-posts">
    <h2>Bài viết liên quan</h2>
    <div class="post-row">
        @foreach ( $list_post as $relatedPost )
      <div class="post-item">
        <div class="post-image" style="display: flex; height:300px; align-items: center; justify-content: center; ">
        <a href="{{ route('site.post.detail', ['slug' => $relatedPost->slug]) }}">
            <img style="" src="{{ asset('images/posts/' . $relatedPost->image) }}" ></img>
        </a>
        </div>

            <h3 style="display: flex;align-items: center; justify-content: center;">{{ $relatedPost->title }}</h3>
          <p style="margin-left:90%">{{ $relatedPost->created_at }}</p>
          <a style="display: flex;align-items: center; justify-content: center;" href="{{ route('site.post.detail', ['slug' => $relatedPost->slug]) }}" class="read-more">chi tiết</a>
      </div>
      @endforeach
    </div>
  </div>

@endsection
