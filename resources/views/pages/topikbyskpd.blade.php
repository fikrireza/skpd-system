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

<div class="row">
  <div class="col-md-8">
     <div class="box box-solid">
       <div class="box-header with-border">
         <i class="fa fa-television"></i>
         <h3 class="box-title">Deskripsi SKPD</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <dl class="dl-horizontal">
           <dt>Kode SKPD : </dt>
           <dd>SKPD001</dd>
           <dt>Nama SKPD : </dt>
           <dd>SKPD Kesehatan</dd>
           <dt>Status : </dt>
           <dd><span class="pull-center badge  bg-green">Aktif</span></dd>
         </dl>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
   <div class="col-md-4">
      <div class="box box-solid">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Topik Pengaduan</span>
              <span class="info-box-number">7360</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    40%
                  </span>
            </div>
          </div>
      </div>
      <a href="{{url('listdataskpdbytopik')}}" class="btn btn-warning pull-right btn-sm btn-flat btn-block">Kembali</a>
    </div>
 </div>

<div class="box box-success">
   <div class="box-header with-border">
     <h3 class="box-title">Seluruh Topik Pengaduan</h3>

     <div class="box-tools pull-right">
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
       </button>
       <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
     </div>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <ul class="products-list product-list-in-box">
       <li class="item">
         <div class="product-info">
           <a href="javascript::;" class="product-title">
             <span class="label label-warning pull-right">24 Januari 2010</span></a>
               <span class="product-description">
                 <div class="box-body">
                   <dl class="dl-horizontal">
                     <dt>Kode Topik Pengaduan : </dt>
                     <dd>TPP001</dd>
                     <dt>Nama Topik Pengaduan : </dt>
                     <dd>TOPIK Kesehatan</dd>
                     <dt>Wajib Proses : </dt>
                     <dd><span class="pull-center badge  bg-green">Ya</span></dd>
                   </dl>
                 </div>
               </span>
           </div>
       </li>
       <li class="item">
         <div class="product-info">
           <a href="javascript::;" class="product-title">
             <span class="label label-warning pull-right">27 Februari 2010</span></a>
               <span class="product-description">
                 <div class="box-body">
                   <dl class="dl-horizontal">
                     <dt>Kode Topik Pengaduan : </dt>
                     <dd>TPP009</dd>
                     <dt>Nama Topik Pengaduan : </dt>
                     <dd>TOPIK Kebudayaan</dd>
                     <dt>Wajib Proses : </dt>
                     <dd><span class="pull-center badge">Tidak</span></dd>
                   </dl>
                 </div>
               </span>
           </div>
       </li>
       <li class="item">
         <div class="product-info">
           <a href="javascript::;" class="product-title">
             <span class="label label-warning pull-right">27 Agustus 2010</span></a>
               <span class="product-description">
                 <div class="box-body">
                   <dl class="dl-horizontal">
                     <dt>Kode Topik Pengaduan : </dt>
                     <dd>TPP006</dd>
                     <dt>Nama Topik Pengaduan : </dt>
                     <dd>TOPIK Pertanian</dd>
                     <dt>Wajib Proses : </dt>
                     <dd><span class="pull-center badge">Tidak</span></dd>
                   </dl>
                 </div>
               </span>
           </div>
       </li>
       <li class="item">
         <div class="product-info">
           <a href="javascript::;" class="product-title">
             <span class="label label-warning pull-right">27 Maret 2011</span></a>
               <span class="product-description">
                 <div class="box-body">
                   <dl class="dl-horizontal">
                     <dt>Kode Topik Pengaduan : </dt>
                     <dd>TPP0010</dd>
                     <dt>Nama Topik Pengaduan : </dt>
                     <dd>TOPIK Teknologi</dd>
                     <dt>Wajib Proses : </dt>
                     <dd><span class="pull-center badge  bg-green">Ya</span></dd>
                   </dl>
                 </div>
               </span>
           </div>
       </li>
       <li class="item">
         <div class="product-info">
           <a href="javascript::;" class="product-title">
             <span class="label label-warning pull-right">27 Juni 2011</span></a>
               <span class="product-description">
                 <div class="box-body">
                   <dl class="dl-horizontal">
                     <dt>Kode Topik Pengaduan : </dt>
                     <dd>TPP004</dd>
                     <dt>Nama Topik Pengaduan : </dt>
                     <dd>TOPIK Keuangan</dd>
                     <dt>Wajib Proses : </dt>
                     <dd><span class="pull-center badge  bg-green">Ya</span></dd>
                   </dl>
                 </div>
               </span>
           </div>
       </li>
     </ul>
   </div>
   <!-- /.box-body -->
   <div class="box-footer text-center">
     <a href="javascript::;" class="uppercase">View All Products</a>
   </div>
   <!-- /.box-footer -->
 </div>


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
@stop
