<div class="post-container">
    <h2 class="section-title">Lastest Post</h2>

    @foreach ($list as $item)
    <div class="post-item">
        <div class="post-image" style="display: flex; height:300px; align-items: center; justify-content: center; ">
        <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}">
            <img style="max-width: 100%; max-height:100%" src="{{ asset('images/posts/' . $item->image) }}" ></img>
        </a>
        </div>

            <h3 style="display: flex;align-items: center; justify-content: center;">{{ $item->title }}</h3>
          <p style="margin-left:90%">{{ $item->created_at }}</p>
          <a style="display: flex;align-items: center; justify-content: center;" href="{{ route('site.post.detail', ['slug' => $item->slug]) }}" class="read-more">chi tiết</a>
      </div>
        @endforeach
  </div>
