@extends('layouts.master')

@section('title')
  <title>Tanggapi Pengaduan</title>
@stop

@section('breadcrumb')
  <h1>
    Tanggapi Pengaduan
    <small>Jawab Laporan Warga</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li class="active">Tanggapi Pengaduan</li>
  </ol>
@stop

@section('content')
  <div class="row">

    <div class="col-md-5">
      <!-- Horizontal Form -->
      <div class="box box-widget">
        <div class='box-header with-border'>
          <div class='user-block'>
            <img class='img-circle' src='{{asset('dist/img/user1-128x128.jpg')}}' alt='user image'>
            <span class='username'><a href="#">Bambang Pamungkis</a></span>
            <span class='description'>24 Mei 2016 | BPJS Kesehatan</span>
          </div><!-- /.user-block -->
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-body'>
          <!-- post text -->
          <p>Yth. SKPD terkait,</p>
          <p>Mohon bantuannya untuk menghubungi bagian pelayanan BPJS pada rumah sakit contoh. Kartu kami dikatakan tidak dapat digunakan pada rumah sakit tersebut.</p>
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
                <button class="btn btn-primary btn-sm btn-flat">Kirim Tanggapan</button>
              </div>
            </div>
          </form>
        </div><!-- /.box-footer -->
      </div><!-- /.box -->
    </div><!--/.col -->

    <div class="col-md-7">
      <div class="box box-success">
        <div class="box-header with-border">
          <div class="box-title">
            Pengaduan Belum Ditanggapi
          </div>
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div>
        <div class="box-body no-padding">
          <table class="table">
            <tr class="bg-green">
              <th style="width:10px;">#</th>
              <th>Pelapor</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>Joni Sangsoko</td>
              <td>BPJS Kesehatan</td>
              <td>21 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Charlie Sumanto</td>
              <td>Pelayanan Kesehatan</td>
              <td>22 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>3.</td>
              <td>Amanda Satyarini</td>
              <td>Pelayanan Obat</td>
              <td>21 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>4.</td>
              <td>Dana Suseno</td>
              <td>Pelayanan Administrasi</td>
              <td>20 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>5.</td>
              <td>Joni Sangsoko</td>
              <td>BPJS Kesehatan</td>
              <td>21 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>6.</td>
              <td>Charlie Sumanto</td>
              <td>Pelayanan Kesehatan</td>
              <td>22 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>7.</td>
              <td>Amanda Satyarini</td>
              <td>Pelayanan Obat</td>
              <td>21 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>8.</td>
              <td>Dana Suseno</td>
              <td>Pelayanan Administrasi</td>
              <td>20 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>9.</td>
              <td>Amanda Satyarini</td>
              <td>BPJS Kesehatan</td>
              <td>21 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
            <tr>
              <td>10.</td>
              <td>Dana Suseno</td>
              <td>Pelayanan Kesehatan</td>
              <td>20 April 2016</td>
              <td><a class="btn btn-xs btn-success">Lihat</a></td>
            </tr>
          </table>
        </div>
        <div class="box-footer">
          <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
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
