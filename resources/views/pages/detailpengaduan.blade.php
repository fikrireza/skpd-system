@extends('layouts.master')

@section('title')
  <title>Detail Pengaduan</title>
@stop

@section('breadcrumb')
  <h1>
    Detail Pengaduan
    <small>Silahkan tanggapi pengaduan berikut</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="{{url('lihatpengaduan')}}">Lihat Seluruh Pengaduan</a></li>
    <li class="active">Detail Pengaduan</li>
  </ol>
@stop

@section('content')

  <!-- Modal -->
  <div class="modal modal-default fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mutasi Pengaduan Warga</h4>
        </div>
        <form class="form" action="dudy.php" method="post">
          <div>
            <div class="modal-body">
                  <div class="form-group">
                    <label>
                      Pilih topik yang relevan dengan aduan warga:
                    </label>
                    <select class="form-control" name="">
                      <option>Kesehatan</option>
                      <option>Lalu Lintas</option>
                    </select>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-warning pull-left" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" id="set">Proses Mutasi Pengaduan</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <div class="row">

    <div class="col-md-12">
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
          <p>Yth. SKPD terkait,</p>
          <p>Mohon bantuannya untuk menghubungi pihak PLN Untuk segera menyalakan kembali aliran listriknya di Wilayah Jalan songsi raya RT.011/05 Tambora, Tanah sereal Jakarta Barat dikarenakan telah sering mati lampu seperti hari ini, dari tadi siang mati lampu dan sampai sekarang belum menyala, sudah lebih dari 6 jam.</p>
          <p>Mohon ditindaklanjuti, terima kasih.</p>


          <!-- Attachment -->
          <div class="attachment-block clearfix">
            <b>Data Pendukung</b><br>
            <i class="text-muted">gambar.jpg</i>
            <div class="pull-right">
              <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#myModal" >Mutasi Pengaduan Ini</button>
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