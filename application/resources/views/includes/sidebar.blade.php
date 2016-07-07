<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      @if(Auth::user()->url_photo!="")
        <img src="{{ url('/') }}/images/{{Auth::user()->url_photo}}" class="img-circle" alt="User Image">
      @else
        <img src="{{ url('/') }}/images/userdefault.png" class="img-circle" alt="User Image">
      @endif
    </div>
    <div class="pull-left info">
      <p>
        @if(Auth::user()->nama!="")
          {{ Auth::user()->nama }}
        @else
          {{ Auth::user()->email }}
        @endif
      </p>
      <a href="#"><i class="fa fa-circle text-success"></i>
        @if(Auth::user()->level=="0")
          {{ "Administrator" }}
        @else
          {{ "User SKPD" }}
        @endif
      </a>
    </div>
  </div>
  <!-- search form -->
  <form action="{{url('pengaduanbytopik')}}" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Cari Topik Pengaduan">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">NAVIGASI UTAMA</li>
    <li class="treeview">
      <a href="{{url('dashboard')}}">
        <i class="fa fa-dashboard"></i> <span>Halaman Utama</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-bullhorn"></i>
        <span>Data Pengaduan</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('lihatpengaduan')}}"><i class="fa fa-circle-o"></i> Lihat Seluruh Pengaduan</a></li>
        @if(Auth::user()->level=="2")
          <li><a href="{{url('tanggap')}}"><i class="fa fa-circle-o"></i> Tanggapi Pengaduan</a></li>
        @endif
      </ul>
    </li>
    @if(Auth::user()->level=="0")
      <li class="treeview">
        <a href="#">
          <i class="fa fa-signal"></i>
          <span>Histori Pengaduan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('admin/historipengaduan')}}"><i class="fa fa-circle-o"></i> Jumlah Pengaduan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-building-o"></i>
          <span>Data SKPD</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('listdataskpdbytopik')}}"><i class="fa fa-circle-o"></i> Lihat Data SKPD</a></li>
          <li><a href="{{route('dataskpd.index')}}"><i class="fa fa-circle-o"></i> Kelola Data SKPD</a></li>
          {{-- <li><a href="{{url('listdatapengaduanbyskpd')}}"><i class="fa fa-circle-o"></i>Daftar Pengaduan By SKPD</a></li> --}}
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-commenting-o"></i>
          <span>Topik Pengaduan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('topikpengaduan.index') }}"><i class="fa fa-circle-o"></i> Kelola Topik pengaduan</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-group"></i>
          <span>Management Akun</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('managementakun.index')}}"><i class="fa fa-circle-o"></i> Kelola Akun</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href=#>
          <i class="fa fa-cog"></i>
          <span>Extravaganza</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('admin/slider')}}"><i class="fa fa-image"></i> <span>Slider</span></a></li>
          <li><a href="{{url('admin/tentang')}}"><i class="fa fa-glass"></i> <span>Tentang</span></a></li>
          <li><a href="{{url('admin/syaratketentuan')}}"><i class="fa fa-gavel"></i> <span>Syarat & Ketentuan</span></a></li>
        </ul>
      </li>
    @endif
  </ul>
</section>
