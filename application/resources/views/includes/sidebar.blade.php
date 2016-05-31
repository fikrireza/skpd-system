<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      @if(Session::has('akses'))
        <p>{{ Session::get('namalogin') }}</p>
        @if(Session::get('akses')=="kesehatan")
          <a href="#"><i class="fa fa-circle text-success"></i> SKPD Kesehatan</a>
        @elseif(Session::get('akses')=="pendidikan")
          <a href="#"><i class="fa fa-circle text-success"></i> SKPD Pendidikan</a>
        @elseif(Session::get('akses')=="administrator")
          <a href="#"><i class="fa fa-circle text-success"></i> Administrator</a>
        @endif
      @endif
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
        <li><a href="{{url('tanggap')}}"><i class="fa fa-circle-o"></i> Tanggapi Pengaduan</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-signal"></i>
        <span>Histori Pengaduan</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('historipengaduan')}}"><i class="fa fa-circle-o"></i> Jumlah Pengaduan</a></li>
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
        <li><a href="{{url('dataskpd')}}"><i class="fa fa-circle-o"></i> Kelola Data SKPD</a></li>
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
        <li><a href="{{url('topikpengaduan')}}"><i class="fa fa-circle-o"></i> Tambah Topik pengaduan</a></li>
      </ul>
    </li>

    {{-- <li class="treeview">
      <a href="#">
        <i class="fa fa-bar-chart"></i>
        <span>Cetak Report</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Report 1</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Report 2</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Report 3</a></li>
      </ul>
    </li> --}}

    <li class="treeview">
      <a href="#">
        <i class="fa fa-group"></i>
        <span>Management Akun</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('managementakun')}}"><i class="fa fa-circle-o"></i> Tambah Akun SKPD</a></li>
      </ul>
    </li>
  </ul>
</section>
