<!-- About Me Box -->
<div class="col-md-3">
  <div class="box box-primary">
    <div class="box-body box-profile" style="height:225px;">
      @if($profiles->url_photo == null)
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
      @else
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/'.$profiles->url_photo) }}" alt="{{$profiles->nama}}">
      @endif
      <h3 class="profile-username text-center">{{ $profiles->nama}}</h3>
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
        {{ $profiles->noktp}}
      </p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> No. Telp</strong>
      <p class="text-muted">{{ $profiles->notelp}}</p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
      <p class="text-muted">{{ $profiles->email}}</p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>
      <p class="text-muted">@if($profiles->jeniskelamin === 'P')
                                Perempuan
                            @elseif($profiles->jeniskelamin === 'L')
                                Laki-Laki
                            @endif</p>

      <hr style="margin-top:2px;margin-bottom:8px;">

      <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
      <p class="text-muted">{{ $profiles->alamat}}</p>
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
