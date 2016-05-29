@extends('layouts.master')

@section('title')
  <title>Lihat Seluruh Pengaduan By SKPD</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Lihat Seluruh Pengaduan Berdasarkan SKPD
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
  </ol>
@stop

@section('content')
  <!-- START MODAL TO ALERT DELETE-->
  <div class="modal modal-default fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:80%">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tanggapi Pengaduan</h4>
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
                </div><!-- /.attachment-block -->

              </div><!-- /.box-body -->
              <div class="box-footer">
                <form action="#" method="post">
                  <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="alt text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <textarea name="name" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."></textarea>
                  </div>
                </form>
              </div><!-- /.box-footer -->
            </div><!-- /.box -->
          </div><!--/.col -->

        </div>   <!-- /.row -->
        <div class="modal-footer">
          <button type="reset" class="btn btn-default btn-sm btn-flat pull-left">Reset Formulir</button>
          <button type="submit" class="btn btn-success pull-right btn-sm btn-flat">Tanggapi</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL TO ALERT DELETE-->

  <div class="row">
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>44</h3>

          <p>Sudah Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="fa fa-smile-o"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Belum Ditanggapi</p>
        </div>
        <div class="icon">
          <i class="fa fa-meh-o"></i>
        </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3>109</h3>

          <p>Jumlah Pengaduan</p>
        </div>
        <div class="icon">
          <i class="ion ion-speakerphone"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Seluruh Data Pengaduan Terkait SKPD</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="tabelpengaduan" class="table table-hover">
            <thead>
              <tr class="bg-green">
                <th>No</th>
                <th>Pelapor</th>
                <th>Topik Aduan</th>
                <th>Tanggal</th>
                <th>Status Aduan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Bambang Pamungkis</td>
                <td>E-KTP &amp; KK</td>
                <td>24 April 2016</td>
                <td><span class="pull-center badge bg-aqua">Sudah Ditanggapi</span></td>
                <td>
                  <span data-toggle="tooltip" title="View Data">
                    <a href="" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-eye"></i></a>
                  </span>
               </td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Amanda Satyarini</td>
                <td>Perizinan</td>
                <td>24 Januari 2016</td>
                <td><span class="pull-center badge bg-red">Belum Ditanggapi</span></td>
                <td>
                  <span data-toggle="tooltip" title="Tanggapi Data">
                    <a href="" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-edit"></i></a>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->

  </div>   <!-- /.row -->


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

  <script>
    $(function () {
      $("#tabelpengaduan").DataTable();
    });
  </script>
@stop
