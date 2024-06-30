<div class="navbar-menu2">
    @if (count($listmenu) == 0)
      <a class="menu-item" href="{{ $menu_item->link }}">{{ $menu_item->name }}</a>
    @else
      <div class="dropdown">
        <a class="menu-item toggle" href="{{ $menu_item->link }}">{{ $menu_item->name }}</a>
        <ul class="dropdown-menu2">
          @foreach ($listmenu as $item)
            <li><a class="dropdown-item2" href="{{ $item->link }}">{{ $item->name }}</a></li>
          @endforeach
        </ul>
      </div>
    @endif

  </div>
