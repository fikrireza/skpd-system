@extends('layouts.master')

@section('title')
  @if(isset($data['bindjabatan']))
    <title>Edit Data Jabatan</title>
  @else
    <title>Tambah Data Jabatan</title>
  @endif
@stop

@section('breadcrumb')
  <h1>
    Tanggapi Pengaduan
    <small>Jawab Laporan Warga</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
@stop

@section('content')
    <script>
      window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 2000);
    </script>

    <!-- Modal -->
    <div class="modal modal-warning fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Hapus Data Jabatan</h4>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin untuk menghapus data jabatan ini?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
            <a href="{{url('masterjabatan/hapusjabatan/1')}}" class="btn btn btn-outline" id="set">Ya, saya yakin.</a>
            {{-- <button type="button" class="btn btn btn-outline" data-dismiss="modal">Ya, saya yakin.</button> --}}
          </div>
        </div>

      </div>
    </div>

  <div class="row">
    <!--column -->
    <div class="col-md-12">
      @if(Session::has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
          <p>{{ Session::get('message') }}</p>
        </div>
      @endif
    </div>
    <div class="col-md-5">
      <!-- Horizontal Form -->
      <div class="box box-widget">
        <div class='box-header with-border'>
          <div class='user-block'>
            <img class='img-circle' src='{{asset('dist/img/user1-128x128.jpg')}}' alt='user image'>
            <span class='username'><a href="#">Bambang Pamungkis</a></span>
            <span class='description'>24 Mei 2016 | Pemadaman Listrik</span>
          </div><!-- /.user-block -->
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-body'>
          <!-- post text -->
          <p>Yth. Kementerian Badan Usaha Milik Negara (BUMN),</p>
          <p>Mohon bantuannya untuk menghubungi pihak PLN Untuk segera menyalakan kembali aliran listriknya di Wilayah Jalan songsi raya RT.011/05 Tambora, Tanah sereal Jakarta Barat dikarenakan telah sering mati lampu seperti hari ini, dari tadi siang mati lampu dan sampai sekarang belum menyala, sudah lebih dari 6 jam.</p>
          <p>Mohon ditindaklanjuti, terima kasih.</p>


          <!-- Attachment -->
          <div class="attachment-block clearfix">
            <b>Data Pendukung</b><br>
            <i class="text-muted">gambar.jpg</i>
            <div class="pull-right">
              <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
            </div>
          </div><!-- /.attachment-block -->

        </div><!-- /.box-body -->
        <div class="box-footer">
          <form action="#" method="post">
            <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="alt text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">
              <textarea name="name" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."></textarea>
              <div class="footer pull-right" style="padding-top:5px;">
                <button class="btn btn-primary btn-sm btn-flat">Simpan</button>
              </div>
            </div>
          </form>
        </div><!-- /.box-footer -->
      </div><!-- /.box -->
    </div><!--/.col -->

    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-title">
            Pengaduan Belum Ditanggapi
          </div>
          <div class='box-tools'>
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div><!-- /.box-tools -->
        </div>
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th style="width:10px;">#</th>
              <th>Pelapor</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>Joni Sangsoko</td>
              <td>E-KTP &amp; KK</td>
              <td>21 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Charlie Sumanto</td>
              <td>Perizinan</td>
              <td>22 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>3.</td>
              <td>Amanda Satyarini</td>
              <td>Pendidikan</td>
              <td>21 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>4.</td>
              <td>Dana Suseno</td>
              <td>Teknologi</td>
              <td>20 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>5.</td>
              <td>Joni Sangsoko</td>
              <td>E-KTP &amp; KK</td>
              <td>21 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>6.</td>
              <td>Charlie Sumanto</td>
              <td>Perizinan</td>
              <td>22 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>7.</td>
              <td>Amanda Satyarini</td>
              <td>Pendidikan</td>
              <td>21 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>8.</td>
              <td>Dana Suseno</td>
              <td>Teknologi</td>
              <td>20 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>9.</td>
              <td>Amanda Satyarini</td>
              <td>Pendidikan</td>
              <td>21 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
            <tr>
              <td>10.</td>
              <td>Dana Suseno</td>
              <td>Teknologi</td>
              <td>20 April 2016</td>
              <td><a class="label bg-blue">Lihat Pengaduan</a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>   <!-- /.row -->


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        $('#set').attr('href', "{{ url('/') }}/masterjabatan/hapusjabatan/"+a);
      });
    });
  </script>
@stop
