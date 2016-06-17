<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="{{ url('/') }}" class="navbar-brand"><span class="logo-lg">
            <img src="{{asset('images/logokabtangerang.png')}}"/>
            &nbsp;&nbsp;<font color="#b600ff"><b>SIMPEDU</b></font>
          </span></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>


      <!-- Menu Kiri -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('beranda') }}">Beranda <span class="sr-only"></span></a></li>
          <li><a href="{{ url('pengaduan') }}">Pengaduan Saya <span class="sr-only"></span></a></li>
          <li><a href="{{ url('semuapengaduan') }}">Daftar Pengaduan</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" method="POST" action="{{ url('pencarian')}}">
          {!! csrf_field() !!}
          <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Pengaduan" name="qr">
          </div>
        </form>
      </div><!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li><!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                @if(auth()->user()->url_photo == null)
                  <img class="user-image" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                @else
                  <img class="user-image" src="{{ asset('/images/'.auth()->user()->url_photo) }}" alt="{{auth()->user()->nama}}">
                @endif
                {{-- <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> --}}
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ auth()->user()->nama}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  @if(auth()->user()->url_photo == null)
                    <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                  @else
                    <img class="img-circle" src="{{ asset('/images/'. auth()->user()->url_photo) }}" alt="{{auth()->user()->nama}}">
                  @endif
                  {{-- <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image"> --}}
                  <p>
                    {{ auth()->user()->nama}}
                    <small>Bergabung Bergabung {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d-M-y')}}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ url('profil') }}" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
    </div><!-- /.container-fluid -->
  </nav>
</header>
