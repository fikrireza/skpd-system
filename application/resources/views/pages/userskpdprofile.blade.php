@extends('layouts.master')

@section('title')
  <title>Profil Saya</title>
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Profile Saya
    <small>Halaman Profil
        @if(Auth::user()->level=="0")
          {{ "Administrator" }}
        @else
          {{ "User SKPD" }}
        @endif
    </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Profil Saya</li>
  </ol>
@stop

@section('content')
  <!-- START DURATION TIME ALERT -->
  <script>
    window.setTimeout(function() {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 2000);
  </script>
  <!-- END DURATION TIME ALERT -->

  <section class="content">
    <div class="modal modal-default fade" id="myModal" role="dialog">
      <div class="modal-dialog" style="width:80%">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Pengaduan</h4>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-widget">
                <div class='box-header with-border'>
                  <div class='user-block'>
                    <img id="fotowarga" class='img-circle' src='{{asset('dist/img/user1-128x128.jpg')}}' alt='user image'>
                    <span class='username'><a href="#"><span id="namawarga"></span></a></span>
                    <span class='description'><span id="tanggal_pengaduan"></span> | <span id="judul_pengaduan"></span></span>
                  </div><!-- /.user-block -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <!-- post text -->
                  <div id="isi_pengaduan" style="margin-bottom:10px;"></div>

                  <!-- Attachment -->
                  <div class="attachment-block clearfix">
                    <b>Data Pendukung</b><br>
                    <div id="data_pendukung">
                      <i class="text-muted">Pengaduan ini tidak memiliki data pendukung.</i>
                    </div>
                  </div>

                  <div id="tanggapan"></div>

                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div><!--/.col -->

          </div>   <!-- /.row -->
          <div class="modal-footer">
            <button type="reset" class="btn btn-warning pull-right btn-sm btn-flat pull-right" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        @if(Session::has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            <p>{{ Session::get('message') }}</p>
          </div>
        @endif
      </div>
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile"
            @if(Auth::user()->level=="0")
              style="height:225px;"
            @else
              style="height:265px;"
            @endif
          >
            @if($getprofile->url_photo=="")
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/') }}/images/userdefault.png" alt="User profile picture">
            @else
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/') }}/images/{{$getprofile->url_photo}}" alt="User profile picture">
            @endif
            <h3 class="profile-username text-center">{{ $getprofile->nama }}</h3>
            <p class="text-muted text-center">
              @if(Auth::user()->level=="0")
                {{ "Administrator" }}
              @else
                {{ "User SKPD" }}
              @endif
            </p>

            <ul class="list-group list-group-unbordered">
              @if(Auth::user()->level=="2")
                <li class="list-group-item">
                  <b>Jumlah Tanggapan Pengaduan</b> <span class="pull-right badge bg-green">
                    {{$getcounttanggap}}
                  </span>
                </li>
              @endif
              <li class="list-group-item">
                <b>Jumlah Login</b> <span class="pull-right badge bg-maroon">
                  {{$getprofile->login_counter}}
                </span>
              </li>
            </ul>
          </div><!-- /.box-body -->

          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>  No. KTP</strong>
            <p class="text-muted">
              @if($getprofile->noktp!="")
                {{ $getprofile->noktp }}
              @else
                <i>Belum ada data</i>
              @endif
            </p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-phone-square margin-r-5"></i> No. Telp</strong>
            <p class="text-muted">
              @if($getprofile->notelp!="")
                {{ $getprofile->notelp }}
              @else
                <i>Belum ada data</i>
              @endif
            </p>

            <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
            <p class="text-muted">{{ $getprofile->email }}</p>

            <hr style="margin-top:2px;margin-bottom:8px;">

              @if($getprofile->jeniskelamin=="P")
                <strong><i class="fa fa-female margin-r-5"></i> Jenis Kelamin</strong>
                <p class="text-muted">Wanita</p>
              @elseif($getprofile->jeniskelamin=="L")
                <strong><i class="fa fa-male margin-r-5"></i> Jenis Kelamin</strong>
                <p class="text-muted">Pria</p>
              @else
                <strong><i class="fa fa-male margin-r-5"></i> Jenis Kelamin</strong>
                <p class="text-muted"><i>Belum ada data</i></p>
              @endif
              <hr style="margin-top:2px;margin-bottom:8px;">

            <strong><i class="fa fa-home margin-r-5"></i> Alamat</strong>
            <p class="text-muted">
              @if($getprofile->alamat!="")
                {{ $getprofile->alamat }}
              @else
                <i>Belum ada data</i>
              @endif
            </p>

          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            @if(Auth::user()->level=="2")
              <li id="tabHistoriTanggapan"
                @if(!(Session::has('errors')) || Session::has('erroroldpass'))
                  class="active"
                @endif
              ><a href="#activity" data-toggle="tab">Histori Tanggapan</a></li>
            @endif

            <li id="tabUbahProfile"
              @if(Auth::user()->level=="0" && !(Session::has('errors') || Session::has('erroroldpass'))))
                class="active"
              @endif
             ><a href="#settings" data-toggle="tab">Ubah Profil</a></li>

            <li
              @if(Session::has('errors') || Session::has('erroroldpass'))
                class="active"
              @endif
            ><a href="#password" data-toggle="tab">Ubah Password</a></li>
          </ul>
          <div class="tab-content">
              <div class="
                @if(Auth::user()->level=="2"  && !(Session::has('errors') || Session::has('erroroldpass')))
                  active
                @endif
               tab-pane" id="activity">
                <!-- Post -->
                <div class="post" style="color:#333;">
                  <table class="table">
                    <tr class="bg-yellow">
                      <th>#</th>
                      <th>Judul Pengaduan</th>
                      <th>Nama Pelapor</th>
                      <th>Tanggal Pengaduan</th>
                      <th>Tanggal Tanggapan</th>
                      <th style="width: 40px">Aksi</th>
                    </tr>
                    <?php
                      $no;
                      if($gethistoritanggapan->currentPage()==1)
                        $no = 1;
                      else
                        $no = (($gethistoritanggapan->currentPage() - 1) * $gethistoritanggapan->perPage())+1;
                      ?>
                    @if($gethistoritanggapan->isEmpty())
                      <tr>
                        <td colspan="5" class="text-muted" style="text-align:center;"><i>Data tidak tersedia.</i></td>
                      </tr>
                    @elseif(isset($gethistoritanggapan))
                      @foreach($gethistoritanggapan as $k)
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$k->judul_pengaduan}}</td>
                          <td>{{$k->nama}}</td>
                          <td>

                            {{ \Carbon\Carbon::parse($k->tanggal_pengaduan)->format('d-M-y')}}
                          </td>
                          <td>

                            {{ \Carbon\Carbon::parse($k->tanggal_tanggapan)->format('d-M-y')}}
                          </td>
                          <td>
                            <span data-toggle="tooltip" title="Lihat Pengaduan">
                              <a href="" data-value="{{ $k->id }}" class="btn btn-primary btn-flat btn-xs viewdetail" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                            </span>
                          </td>
                        </tr>
                        <?php $no++; ?>
                      @endforeach
                    @endif
                    {{-- @else
                      <tr>
                        <td colspan="6" class="text-muted" style="text-align:center;"><i>Data tidak tersedia.</i></td>
                      </tr>
                    @endif --}}
                  </table>
                  <div class="box-footer">
                    <div class="pagination pagination-sm no-margin pull-right">
                      {{ $gethistoritanggapan->links() }}
                    </div>
                  </div>
                </div><!-- /.post -->
              </div><!-- /.tab-pane -->

              <div class="
                @if(Auth::user()->level=="0" && !(Session::has('errors') || Session::has('erroroldpass')))
                  {{ 'active' }}
                @endif
              tab-pane" id="settings">
                <form class="form-horizontal" action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                      <input name="nama" type="text" class="form-control" placeholder="Name" value="{{ $getprofile->nama }}">
                      <input name="id" type="hidden" class="form-control" placeholder="Name" value="{{ $getprofile->id }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. KTP</label>
                    <div class="col-sm-10">
                      <input name="noktp" type="text" class="form-control" placeholder="No. KTP" value="{{ $getprofile->noktp }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telepon</label>
                    <div class="col-sm-10">
                      <input name="notelp" type="text" class="form-control" placeholder="No. Telp" value="{{ $getprofile->notelp }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input readonly name="email" type="email" class="form-control" placeholder="Email" value="{{ $getprofile->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9" style="margin-left:30px; padding-left:0px; margin-top:5px; height:30px;">
                      <div class="form-group">
                        <label>
                          <input value="L" type="radio" name="jk" class="minimal form-control"
                            @if($getprofile->jeniskelamin=="L")
                              checked="checked"
                            @endif
                          >
                        </label>
                        &nbsp;
                        <label>Pria</label>
                        &nbsp;&nbsp;
                        <label>
                          <input value="P" type="radio" name="jk" class="minimal form-control"
                            @if($getprofile->jeniskelamin=="P")
                              checked="checked"
                            @endif
                          >
                        </label>
                        &nbsp;
                        <label>Wanita</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" placeholder="Alamat" rows="5">{{$getprofile->alamat}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Foto Profil</label>
                    <div class="col-sm-10">
                      <input name="url_photo" type="file" class="form-control" value="{{ $getprofile->url_photo }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-flat">Simpan Perubahan</button>
                    </div>
                  </div>
                </form>
              </div><!-- /.tab-pane -->

                <div class="
                  @if(Session::has('errors') || Session::has('erroroldpass'))
                    {{ 'active' }}
                  @endif
                tab-pane" id="password">
                <form class="form-horizontal" action="{{ route('ganti.password') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group {{ $errors->has('oldpass') ? 'has-error' : '' }} {{ Session::has('erroroldpass') ? 'has-error' : ''  }}">
                    <label class="col-sm-2 control-label">Password Lama</label>
                    <div class="col-sm-10">
                      <input name="oldpass" type="password" class="form-control" placeholder="Password Lama"   @if(!$errors->has('oldpass'))
                        value="{{ old('oldpass') }}"
                      @endif
                      >
                      <input name="id" type="hidden" class="form-control" value="{{ $getprofile->id }}">
                      @if($errors->has('oldpass'))
                        <span class="help-block">
                          <strong>{{ $errors->first('oldpass') }}
                          </strong>
                        </span>
                      @endif

                      @if(Session::has('erroroldpass'))
                        <span class="help-block">
                          <strong>{{ Session::get('erroroldpass') }}
                          </strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('newpass') ? 'has-error' : '' }} ">
                    <label class="col-sm-2 control-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input name="newpass" type="password" class="form-control" placeholder="Password Baru" @if(!$errors->has('newpass'))
                        value="{{ old('newpass') }}"
                      @endif
                      >
                      @if($errors->has('newpass'))
                        <span class="help-block">
                          <strong>{{ $errors->first('newpass') }}
                          </strong>
                        </span>
                      @endif
                    </div>
                </div>
                  <div class="form-group {{ $errors->has('newpass_confirmation') ? 'has-error' : '' }}">
                    <label class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-10">
                      <input name="newpass_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password Baru"
                      @if(!$errors->has('newpass_confirmation'))
                        value="{{ old('newpass_confirmation') }}"
                      @endif
                      >
                      @if($errors->has('newpass_confirmation'))
                        <span class="help-block">
                          <strong>{{ $errors->first('newpass_confirmation') }}
                          </strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-flat">Ganti Password Saya</button>
                    </div>
                  </div>
                </form>
              </div>
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->
    </div><!-- /.row -->

  </section><!-- /.content -->


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  {{-- icheck --}}
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      $('a.viewdetail').click(function(){
        var a = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/pengaduandetail/bind/"+a,
          dataType: 'json',
          success: function(data){
            //get
            var id = data[0].id;
            var judul_pengaduan = data[0].judul_pengaduan;
            var tanggal_pengaduan = data[0].tanggal_pengaduan;
            var isi_pengaduan = data[0].isi_pengaduan;
            var tanggap = data[0].tanggapan;
            var nama_penanggap = data[0].nama;
            var nama_skpd = data[0].nama_skpd;
            var nama = data[0].nama;
            var dokumen = data[0].url_dokumen;
            var tanggal_tanggap = data[0].tanggal_tanggap;
            var url_photo = data[0].url_photo;

            // change date format
            var mydate = new Date(tanggal_tanggap);
            var tanggal_tanggap = mydate.toString("dd MMMM yyyy");

            var mydate = new Date(tanggal_pengaduan);
            var tanggal_pengaduan = mydate.toString("dd MMMM yyyy");

            // set
            $('span#judul_pengaduan').html(judul_pengaduan);
            $('span#namawarga').html(nama);
            $('span#tanggal_pengaduan').html(tanggal_pengaduan);
            $('div#isi_pengaduan').html(isi_pengaduan);
            if (url_photo!=null) {
              $('img#fotowarga').attr('src', "{{ url('/') }}/images/"+url_photo);
            } else {
              $('img#fotowarga').attr('src', "{{ url('/') }}/images/userdefault.png");
            }

            if (url_photo==null) {
              url_photo = "userdefault.png";
            }

            if(tanggap!=null)
            {
              $('div#tanggapan').html(
                "<div class='box-footer box-comments' style='border:1px solid #00a65a;'>"+
                "<div style='padding-bottom:5px;'>"+
                "<b>Tanggapan</b>"+
                "</div>"+
                "<div class='box-comment'>"+
                "<img class='img-circle img-sm' src='{{ url('/') }}/images/userdefault.png' alt='user image'>"+
                "<div class='comment-text'>"+
                "<span class='username'>"+
                "Administrator SKPD " + nama_skpd +
                "<span class='text-muted pull-right'>"+ tanggal_tanggap +"</span>"+
                "</span>"+
                tanggap +
                "</div>"+
                "</div>"+
                "</div>"
              );
            }
            else {
              $('div#tanggapan').html("");
            }

            if(dokumen!=null) {
                $.ajax({
                  url: "{{ url('/') }}/getdokumenpengaduan/bind/"+a,
                  success: function(datax) {
                    $('div#data_pendukung').html("");
                    for (var i = 0; i < datax.length; i++) {
                      var ext = datax[i].url_dokumen.split('.').pop();
                      if(ext=="pdf") {
                        $('div#data_pendukung').append(
                          "<a href='{{asset("documents")}}/"+ datax[i].url_dokumen +"' download='"+ datax[i].url_dokumen +"'>"+
                            "<img width='3%' src='{{ asset("dist/img/pdf.png") }}' alt='...' class='margin'>"+
                          "</a>"
                        );
                      } else if (ext=="png") {
                        $('div#data_pendukung').append(
                          "<a href='{{asset("documents")}}/"+ datax[i].url_dokumen +"' download='"+ datax[i].url_dokumen +"'>"+
                            "<img width='3%' src='{{ asset("dist/img/png.png") }}' alt='...' class='margin'>"+
                          "</a>"
                        );
                      } else if (ext=="jpg") {
                        $('div#data_pendukung').append(
                          "<a href='{{asset("documents")}}/"+ datax[i].url_dokumen +"' download='"+ datax[i].url_dokumen +"'>"+
                            "<img width='3%' src='{{ asset("dist/img/jpg.png") }}' alt='...' class='margin'>"+
                          "</a>"
                        );
                      } else if (ext=="docx") {
                        $('div#data_pendukung').append(
                          "<a href='{{asset("documents")}}/"+ datax[i].url_dokumen +"' download='"+ datax[i].url_dokumen +"'>"+
                            "<img width='3%' src='{{ asset("dist/img/doc.png") }}' alt='...' class='margin'>"+
                          "</a>"
                        );
                      } else if (ext=="xlsx") {
                        $('div#data_pendukung').append(
                          "<a href='{{asset("documents")}}/"+ datax[i].url_dokumen +"' download='"+ datax[i].url_dokumen +"'>"+
                            "<img width='3%' src='{{ asset("dist/img/doc.png") }}' alt='...' class='margin'>"+
                          "</a>"
                        );
                      }

                    }
                  }
                });
            }
            else {
              $('div#data_pendukung').html("<i class='text-muted'>Pengaduan ini tidak memiliki data pendukung.</i>");
            }
          }
        });
      })
    });
  </script>
@stop
