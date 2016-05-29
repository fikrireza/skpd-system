<!-- GET CONTENT LAYOUT -->
@extends('layouts.master')

<!-- START CONDITION SECTION TITLE-->
@section('title')
    <title>List Data Pengduan All</title>
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop
<!-- END CONDITION SECTION TITLE-->

@section('breadcrumb')
  <h1>
      Data Pengaduan<small>Kelola Data Pengaduan</small>
  </h1>
  <ol class="breadcrumb">
    <li>
        <a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Halaman Utama</a>
    </li>
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
                <div class="pull-right">
                  <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
                </div>
              </div><!-- /.attachment-block -->
              <div class='box-footer box-comments' style="border:1px solid #00a65a;">
                <div style="padding-bottom:5px;">
                  <b>Tanggapan</b>
                </div>
                <div class='box-comment'>
                  <!-- User image -->
                  <img class='img-circle img-sm' src='{{asset('dist/img/user3-128x128.jpg')}}' alt='user image'>
                  <div class='comment-text'>
                    <span class="username">
                      Administrator SKPD Pelayanan Publik
                      <span class='text-muted pull-right'>25 April 2016</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div><!-- /.comment-text -->
                </div><!-- /.box-comment -->
              </div><!-- /.box-footer -->
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
<!-- END MODAL TO ALERT DELETE-->

 <div class="row">
   <div class="col-md-12">
     <!-- Horizontal Form -->
     <div class="box box-warning">
       <div class="box-header">
         <h3 class="box-title">Seluruh Data Pengaduan</h3>
       </div><!-- /.box-header -->
       <div class="box-body">
         <table id="tabeluser" class="table table-hover">
           <thead>
             <tr class="bg-yellow">
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
                <td>BPJS Kesehatan</td>
                <td>24 April 2016</td>
                <td><span class="pull-center badge bg-aqua">Sudah Ditanggapi</span></td>
                <td>
                  <span data-toggle="tooltip" title="View Data">
                    <a href="" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-eye"></i></a>
                  </span>
               </td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Amanda Satyarini</td>
                <td>Pelayanan Obat</td>
                <td>24 Januari 2016</td>
                <td><span class="pull-center badge bg-red">Belum Ditanggapi</span></td>
                <td>
                  <span data-toggle="tooltip" title="Edit Data">
                    <a href="" class="btn btn-warning btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-edit"></i></a>
                  </span>
                </td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Bambang Pamungkis</td>
                <td>BPJS Kesehatan</td>
                <td>24 April 2016</td>
                <td><span class="pull-center badge bg-aqua">Sudah Ditanggapi</span></td>
                <td>
                  <span data-toggle="tooltip" title="View Data">
                    <a href="" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-eye"></i></a>
                  </span>
               </td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Amanda Satyarini</td>
                <td>Pelayanan Obat</td>
                <td>24 Januari 2016</td>
                <td><span class="pull-center badge bg-red">Belum Ditanggapi</span></td>
                <td>
                  <span data-toggle="tooltip" title="Edit Data">
                    <a href="" class="btn btn-warning btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-edit"></i></a>
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
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      $('a.hapus').click(function(){
        var a = $(this).data('value');
        // $('#set').attr('href', "{{ url('/') }}/masterbahasaasing/delete/"+a);
      });
    });
  </script>
  <script>
    $(function () {
      $("#tabeluser").DataTable();
    });
  </script>
@stop
