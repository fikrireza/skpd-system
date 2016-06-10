@extends('front.template')

@section('title')
  <title>SIMPEDU</title>
@stop

@section('content')

  @if(Session::has('ubahprofile'))
  <div class="col-md-12">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        <p>{{ Session::get('ubahprofile') }}</p>
      </div>
  </div>
  @endif

  <div class="col-md-9">
    @include('front.form')

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#kesehatan" data-toggle="tab" aria-expanded="true">Kesehatan</a></li>
      <li class=""><a href="#perhubungan" data-toggle="tab" aria-expanded="false">Perhubungan</a></li>
      <li class=""><a href="#pendidikan" data-toggle="tab" aria-expanded="false">Pendidikan</a></li>
      <li class=""><a href="#kependudukan" data-toggle="tab" aria-expaded="false">Kependudukan</a></li>
      <li class=""><a href="#tenagakerja" data-toggle="tab" aria-expaded="false">Tenaga Kerja</a></li>
      <li class=""><a href="#polkam" data-toggle="tab" aria-expaded="false">Politik dan Keamanan</a></li>
      <li class=""><a href="#geografi" data-toggle="tab" aria-expaded="false">Geografi</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="kesehatan">
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user1-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Pelayanan BPJS semakin tidak memuaskan</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
            Mohon perhatiannya. Terima Kasih.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user7-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Mohon perhatikan kesehatan warga tangerang</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-red">Belum ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user6-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Penyelenggaraan imunisasi nasional di tangerang</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
            Mohon perhatiannya. Terima Kasih.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
      </div><!-- /.tab-pane -->
      <div class="tab-pane" id="perhubungan">
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Contoh pengaduan warga</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
            Mohon perhatiannya. Terima Kasih.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Contoh pengaduan warga</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-red">Belum ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Contoh pengaduan warga</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
            Mohon perhatiannya. Terima Kasih.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
      </div><!-- /.tab-pane -->

      <div class="tab-pane" id="pendidikan">
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user4-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Contoh pengaduan warga</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
            Mohon perhatiannya. Terima Kasih.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
        <!-- Post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user5-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Contoh pengaduan warga</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-red">Belum ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Lorem ipsum represents a long-held tradition for designers,
            typographers and the like. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans. Some people hate it and argue for
            its demise, but others ignore the hate as they create awesome
            tools to help create filler text for everyone from bacon lovers
            to Charlie Sheen fans.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
        <div class="post">
          <div class="user-block">
            <img class="img-circle img-bordered-sm" src="{{ asset('/dist/img/user8-128x128.jpg') }}" alt="user image">
            <span class="username">
              <span>Contoh pengaduan warga</span>
              <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->
            </span>
            <span class="description"><span class="label bg-green">Telah ditanggapi</span> - 7:30 PM today</span>
          </div><!-- /.user-block -->
          <p>
            Dear SKPD Kesehatan, saya melakukan registrasi baru untuk saya, istri dan anak saya. untuk saya dan istri registrasi dan aktivasi sudah berhasil, akan tetapi untuk anak saya belum bisa aktivasi, walaupun saya sudah terima email konfirmasi (2x emaill konfirmasi untuk anak saya). kenapa konfirmasi untuk anak saya tidak bisa di aktivasi, apakah karena datanya double?
            Mohon perhatiannya. Terima Kasih.
          </p>
          <p>
            <a href="{{url('detail/pengaduan-warga')}}">[Selengkapnya]</a>
          </p>
        </div><!-- /.post -->
      </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
  </div><!-- /.nav-tabs-custom -->
</div>

@include('front.sidebar1')
@stop
