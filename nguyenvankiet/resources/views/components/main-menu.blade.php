<nav class="navbar">
    <div class="navbar-container">
        <a href="/">
      <img class="image-header"  src="{{asset('images/logo.png')}}">
    </a>
      <div class="navbar-menu2" style="margin-left:400px">
        @foreach ($listmenu as $rowmenu)
          <x-main-menu-item :rowmenu="$rowmenu" />
        @endforeach
        <form class="navbar-search" action="{{ route('site.product.search') }}" method="GET">
            <input class="search-input" name="search" type="search" placeholder="Search">
            <button  class="search-button" type="submit">Search</button>
          </form>
          @php
            $count = count(session('carts', []));
      @endphp
        <div class="navbar-cart" style="margin-left:20%; color:aliceblue;">
          <a class="cart-link" href="{{ route('site.cart.index') }}" >Shopping Cart  (<span class="badge" id="showqty">{{ $count }}</span>)</a>
        </div>
      </div>
    </div>
  </nav>
