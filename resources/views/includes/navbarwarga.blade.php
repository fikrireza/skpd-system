<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="{{ url('/')}}" class="logo">
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
      </div>

      <!-- Menu Kiri -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('beranda') }}">Beranda <span class="sr-only">(current)</span></a></li>
          <li><a href="{{ url('laporan') }}">Laporan Saya <span class="sr-only"></span></a></li>
          <li><a href="{{url('semualaporan')}}">Daftar Laporan</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
          </div>
        </form>
      </div><!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Dwi Handika Putro</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                  <p>
                    Dwi Handika Putro
                    <small>Bergabung Sejak Nov. 2015</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ url('profil') }}" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{url('/')}}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
    </div><!-- /.container-fluid -->
  </nav>
</header>
