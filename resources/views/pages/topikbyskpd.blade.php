<!-- GET CONTENT LAYOUT -->
@extends('layouts.master')

<!-- START CONDITION SECTION TITLE-->
@section('title')
    <title>List Data Topik Berdasarkan SKPD</title>
@stop
<!-- END CONDITION SECTION TITLE-->

@section('breadcrumb')
  <h1>
      Data Topik Pengaduan Berbadasarkan SKPD <small>Kelola Data SKPD</small>
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
        <a href="{{url('topikbyskpd')}}" class="btn btn-warning pull-right btn-sm btn-flat pull-right">Kembali</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL TO ALERT DELETE-->

<div class="row">
  <div class="col-md-12">
     <div class="box box-solid">
       <div class="box-header with-border">
         <i class="fa fa-television"></i>
         <h3 class="box-title">Deskripsi SKPD</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col-md-6">
             <dl class="dl-horizontal">
               <dt>Kode SKPD : </dt>
                <dd>SKPD001</dd>
               <dt>Nama SKPD : </dt>
                <dd>SKPD Kesehatan</dd>
               <dt>Status : </dt>
                <dd><span class="pull-center badge  bg-green">Aktif</span></dd>
               <dt>Belum Ditanggapi : </dt>
                 <dd>20</span></dd>
                <dt>Sudah Ditanggapi : </dt>
                 <dd>10</dd>
             </dl>
           </div>
           <div class="col-md-6">
             <table class="table table-hover">
               <tr class="bg-green">
                 <th style="width:10px;">No</th>
                 <th>Kode Topik Pengaduan</th>
                 <th>Nama Topik Pengaduan</th>
               </tr>
               <tr>
                 <td>1.</td>
                 <td>TPP001</td>
                 <td>TOPIK Kesehatan Masyarakat</td>
               </tr>
               <tr>
                 <td>2.</td>
                 <td>TPP002</td>
                 <td>TOPIK Kesehatan Pemerintah</td>
               </tr>
               <tr>
                 <td>3.</td>
                 <td>TPP003</td>
                 <td>TOPIK Kesehatan Warga</td>
               </tr>
             </table>
           </div>
         </div>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
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
                   <a href="" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-eye"></i></a>
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
                   <a href="" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#myModal" data-value="#"><i class="fa fa-edit"></i></a>
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
      $("#tabelpengaduan").DataTable();
    });
  </script>
@stop
