<div>

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-left: 200px">
    <img style="width:50px; height:50px; margin-right:100px" src="{{asset('images/logo.png')}}"></img>
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @foreach ($listmenu as $rowmenu)
        <x-main-menu-item :rowmenu="$rowmenu" />
    @endforeach
    <form style="margin-top:10px;margin-left:20px; font-size: 14px;" class="d-flex" role="search">
        <input class="form-control me-2"  style="height:30px; font-size: 14px;" type="search" placeholder="Search" aria-label="Search">
        <button style="width:50px; height:30px;font-size: 14px;" class="btn btn-outline-success d-flex justify-content-center" type="submit">
            <span>Search</span>
          </button>      </form>
      <li class="nav-item" style="margin-left: 30px;">
        <a class="nav-link active" aria-current="page" href="#">Shopping Cart</a>
      </li>
    </ul>
</div>
</div>
</nav>
</div>
