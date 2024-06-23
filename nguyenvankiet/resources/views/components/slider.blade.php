
    <div class="slider">
        @foreach($list_banner as $row)
        @if($loop->first)
        <div class = "slide">
          <img class="img-fluid" src="{{asset('images/banners/'.$row->image)}}"  alt="{{ $row->image }}">
        </div>
        @else
        <div class = "slide">
            <img class="img-fluid" src="{{asset('images/banners/'.$row->image)}}"   alt="{{ $row->image }}">
          </div>
        @endif
    @endforeach

    <div class="loader"></div>

      </div>

