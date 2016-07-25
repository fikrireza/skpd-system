<a href="{{url('dashboard')}}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">
    <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
  </span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg">
    <img src="{{asset('images/logokabtangerang.png')}}" alt="SPD" />
    &nbsp;&nbsp;<b>SIMPEDU</b>
  </span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          @if(Auth::user()->url_photo!="")
            <img src="{{ url('/') }}/images/{{Auth::user()->url_photo}}" class="user-image" alt="User Image">
          @else
            <img src="{{ url('/') }}/images/userdefault.png" class="user-image" alt="User Image">
          @endif
          <span class="hidden-xs">
            @if(Auth::user()->nama!="")
              {{ Auth::user()->nama }}
            @else
              {{ Auth::user()->email }}
            @endif
          </span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            @if(Auth::user()->url_photo!="")
              <img src="{{ url('/') }}/images/{{Auth::user()->url_photo}}" class="img-circle" alt="User Image">
            @else
              <img src="{{ url('/') }}/images/userdefault.png" class="img-circle" alt="User Image">
            @endif
            <p>
              @if(Auth::user()->nama!="")
                {{ Auth::user()->nama }}
              @else
                {{ Auth::user()->email }}
              @endif
              <small>
                Terdaftar tahun
                <?php
                  $tanggal = Auth::user()->created_at;
                  $potong = substr($tanggal, 0, 4);
                  echo $potong;
                 ?>
              </small>
            </p>
          </li>

          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{ route('my.profile') }}" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
