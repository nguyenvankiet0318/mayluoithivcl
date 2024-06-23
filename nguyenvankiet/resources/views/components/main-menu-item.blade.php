<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @if (count($listmenu) == 0)
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" style="margin-left:10px;" href="{{ $menu_item->link }}">{{ $menu_item->name }}</a>
  </li>
  @else
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="{{ $menu_item->link }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $menu_item->name }}
    </a>
    <ul class="dropdown-menu">
        @foreach ($listmenu as $item)
      <li><a class="dropdown-item" href="{{ $item->link }}">{{ $item->name }}</a></li>
      @endforeach
    </ul>
  </li>
  @endif



