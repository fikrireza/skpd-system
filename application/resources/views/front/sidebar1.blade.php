@if(session('level') == 1)
<!-- About Me Box -->
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body box-profile" style="height:225px;">
      @if(auth()->user()->url_photo == null)
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
      @else
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/'.auth()->user()->url_photo) }}" alt="{{auth()->user()->nama}}">
      @endif
      <h3 class="profile-username text-center">{{ auth()->user()->nama}}</h3>
      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <b>Pengaduan Anda</b> <span class="pull-right badge bg-green">{{ $pengaduanWid }}</span>
        </li>
        <li class="list-group-item">
          <b>Telah Ditanggapi</b> <span class="pull-right badge bg-green">{{ $tanggapWid }}</span>
        </li>
      </ul>
    </div><!-- /.box-body -->
    <div class="box-body" style="margin-top:10px;">
      <strong><i class="fa fa-book margin-r-5"></i>  No. KTP</strong>
      <p class="text-muted">
        @if(auth()->user()->noktp == '')
          -
        @else
          {{ auth()->user()->noktp}}
        @endif
      </p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> No. Telp</strong>
      <p class="text-muted">
        @if(auth()->user()->notelp == '')
          -
        @else
          {{ auth()->user()->notelp}}
        @endif
      </p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
      <p class="text-muted">{{ auth()->user()->email}}</p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>
      <p class="text-muted">@if(auth()->user()->jeniskelamin === 'P')
                                Perempuan
                            @elseif(auth()->user()->jeniskelamin === 'L')
                                Laki-Laki
                            @elseif(auth()->user()->jeniskelamin == '')
                              -
                            @endif</p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
      <p class="text-muted">
        @if(auth()->user()->alamat == '')
          -
        @else
          {{ auth()->user()->alamat}}
        @endif
      </p>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Pengaduan Terbaru</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <strong><i class="fa fa-book margin-r-5"></i>  Pendidikan</strong>
      <p>
        <div class="">
          <a href="" class="text-muted">
            Biaya sekolah terlalu mahal
          </a>
        </div>
        <div class="">
          <a href="" class="text-muted">
            Buku paket tidak tersedia di sekolah
          </a>
        </div>
        <div class="">
          <a href="" class="text-muted">
            Guru sering datang terlambat
          </a>
        </div>
      </p>

      <hr>

      <strong><i class="fa fa-map-marker margin-r-5"></i> Jalan</strong>
      <p>
        <div class="">
          <a href="" class="text-muted">
            Jalan talagasari banyak lubang
          </a>
        </div>
        <div class="">
          <a href="" class="text-muted">
            Mohon rambu jalan diperjelas
          </a>
        </div>
        <div class="">
          <a href="" class="text-muted">
            Marka jalan tidak terlihat di tol balaraja
          </a>
        </div>
      </p>

    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->

@else
  coba
@endif
