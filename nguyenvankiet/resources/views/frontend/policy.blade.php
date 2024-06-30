@extends('layout.site')
@section('title', 'giới thiệu')
@section('content')
<link rel="stylesheet" href="{{ asset('css/policy.css') }}">

<body>
  <header>
    <h1>Về chúng tôi và chính sách mua bán</h1>
    <nav>
      <ul>
        @foreach ( $list_policy as $item )
        <li><a href="#{{$item->slug}}">{{$item->title}}</a></li>
        @endforeach
      </ul>
    </nav>
  </header>

  <main>
    @foreach ( $list_policy as $item )
    <section id="{{$item->slug}}">

      <h2>{{$item->title}}</h2>
      @if ($item->image)
      <img src="{{ asset('images/posts/' . $item->image) }}" ></img>
      @endif

      <p>{{$item->detail}}</p>
    </section>
    @endforeach

  </main>
</body>


@endsection
