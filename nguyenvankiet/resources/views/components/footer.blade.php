
<footer class="footer" style="display:flex; justify-content: center;">
    <div class="container">
      <div class="row">
        <div style="display:flex; justify-content: center;" >
        <div class="col">
          <h5>Về chúng tôi</h5>
          <p>{{$about_us->detail}}</p>
        </div>
    </div>
        <div class="col-md-4" >
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            @foreach ($listmenu as $item)
            <li><a href="{{$item->link}}">{{$item->name}}</a></li>
           @endforeach
          </ul>
        </div>
        <div class="col-md-4" >
          <h5>Liên hệ chúng tôi</h5>
          <ul class="list-unstyled">
            <li>Địa chỉ: {{$list_contactadmin->address}}</li>
            <li>Email: {{$list_contactadmin->email}}</li>
            <li>Số điện thoại: {{$list_contactadmin->phone}}</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <p>&copy; 2023 Your Company. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
