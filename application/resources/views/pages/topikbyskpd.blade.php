<!-- GET CONTENT LAYOUT -->
@extends('layouts.master')

<!-- START CONDITION SECTION TITLE-->
@section('title')
    <title>List Data Topik Berdasarkan SKPD</title>
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
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
        <h4 class="modal-title">Detail Pengaduan</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-widget">
            <div class='box-header with-border'>
              <div class='user-block'>
                <img class='img-circle' src='{{asset('dist/img/user1-128x128.jpg')}}' alt='user image'>
                <span class='username'><a href="#">Bambang Pamungkis</a></span>
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
<!-- END MODAL TO ALERT DELETE-->

<div class="row">
  <div class="col-md-8">
     <div class="box box-solid">
       <div class="box-header with-border">
         <i class="fa fa-television"></i>
         <h3 class="box-title">Deskripsi SKPD</h3>
       </div>
       <div class="box-body">
         <dl class="dl-horizontal">
           <dt>Kode SKPD : </dt>
            <dd>{{ $getskpd[0]->kode_skpd }}</dd>
           <dt>Nama SKPD : </dt>
            <dd>{{ $getskpd[0]->nama_skpd }}</dd>
           <dt>Status : </dt>
           @if($getskpd[0]->flag_skpd=="1")
             <dd><span class="pull-center badge  bg-green">Aktif</span></dd>
           @else
             <dd><span class="pull-center badge  bg-grey">Tidak Aktif</span></dd>
           @endif
         </dl>
        <div class="box-body no-padding">
         <table class="table table-hover">
           <tr class="bg-yellow">
             <th>No</th>
             <th>Kode Topik Pengaduan</th>
             <th>Nama Topik Pengaduan</th>
             <th>Jumlah Pengaduan</th>
           </tr>

             @if($gettopik->isEmpty())
               <tr>
                 <td colspan="4" class="text-muted" style="text-align:center;"><i>Data topik aduan tidak tersedia.</i></td>
               </tr>
             @else
               <?php
                 $no;
                 if($gettopik->currentPage()==1)
                   $no = 1;
                 else
                   $no = (($gettopik->currentPage() - 1) * $gettopik->perPage())+1;
               ?>
               @foreach($gettopik as $key)
                 <tr>
                   <td>{{ $no }}.</td>
                   <td>{{ $key->kode_topik }}</td>
                   <td>{{ $key->nama_topik }}</td>
                   <td>
                     <span class="pull-center badge  bg-maroon">{{ $key->jumlahpengaduan }}</span>
                   </td>
                 </tr>
                 <?php $no++; ?>
               @endforeach
             @endif
         </table>
         <div class="pull-right">
           {{ $gettopik->links() }}
         </div>
        </div>
       </div>
       <!-- /.box-header -->
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
   <div class="col-md-4">
     <div class="small-box bg-red">
       <div class="inner">
         <h3>{{ $getbelumtanggap->belumtanggap }}</h3>
         <p>Belum Ditanggapi</p>
       </div>
       <div class="icon">
         <i class="fa fa-meh-o"></i>
       </div>
       <a class="small-box-footer">
         <i>Terdapat {{ $getbelumtanggap->belumtanggap }} pengaduan belum di tanggapi.</i>
       </a>
     </div>
     <div class="small-box bg-aqua">
       <div class="inner">
         <h3>{{ $getsudahtanggap->sudahtanggap }}</h3>
         <p>Sudah Ditanggapi</p>
       </div>
       <div class="icon">
         <i class="fa fa-smile-o"></i>
       </div>
       <a class="small-box-footer">
         <i>Terdapat {{ $getsudahtanggap->sudahtanggap }} pengaduan sudah di tanggapi.</i>
       </a>
     </div>
   </div>
 </div>

 <div class="row">
   <div class="col-md-12">
     <div class="box box-primary">
       <div class="box-header">
         <h3 class="box-title">Seluruh Data Pengaduan SKPD Terkait</h3>
         <div class="btn-group pull-right">
           <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             Download <span class="caret"></span>
             <span class="sr-only">Toggle Dropdown</span>
           </button>
           <ul class="dropdown-menu" role="menu">
             <li><a href="{{ URL::to('admin/topikbyskpd/pdf/'.$getskpd[0]->id) }}">PDF</a></li>
             <li><a href="{{ URL::to('admin/topikbyskpd/xlsx/'.$getskpd[0]->id) }}">Excel</a></li>
           </ul>
         </div>
       </div>
       <div class="box-body">
         <table id="tabeluser" class="table table-hover">
           <thead>
             <tr class="bg-yellow">
               <th>No</th>
               <th>Pelapor</th>
               <th>Topik Aduan</th>
               <th>Tanggal Aduan</th>
               <th>Tanggal Terproses</th>
               <th>Durasi Pemrosesan</th>
               <th>Status Aduan</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
              <?php $no = 1; ?>
               @foreach($getpengaduan as $key)
                 <tr>
                   <td>{{$no}}.</td>
                   <td>{{ $key->nama }}</td>
                   <td>{{ $key->nama_topik }}</td>
                   <td>{{ \Carbon\Carbon::parse($key->tanggaladuan)->format('d-M-y H:i:s')}}</td>
                   <td>
                    @if($key->flag_tanggap=="0")
                      --
                    @else
                      {{ \Carbon\Carbon::parse($key->tanggaltanggap)->format('d-M-y H:i:s')}}
                    @endif
                   </td>
                   <td>
                     @if($key->flag_tanggap=="0")
                       --
                     @else
                      <?php
                        $date1=date_create($key->tanggaltanggap);
                        $date2=date_create($key->tanggaladuan);
                        $diff=date_diff($date2,$date1);
                        $sym = substr($diff->format("%R%a"), 0, 1);
                        $days = substr($diff->format("%R%a"), 1);
                      ?>
                      {{-- @if($days==0)
                        <span class="pull-center badge bg-purple">Hari yang sama</span>
                      @else --}}
                        <span class="pull-center badge bg-purple">{{$days}} Hari</span>
                      {{-- @endif --}}
                     @endif
                   </td>
                   <td>
                     @if($key->flag_tanggap=="0")
                       <span class="pull-center badge bg-red">Belum Ditanggapi</span>
                     @else
                       <span class="pull-center badge bg-aqua">Sudah Ditanggapi</span>
                     @endif
                   </td>
                   <td>
                     <span data-toggle="tooltip" title="Lihat Data Pengaduan">
                       <a href="" data-value="{{ $key->pengaduanid }}" class="btn btn-primary btn-flat btn-xs viewdetail" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                     </span>
                   </td>
                 </tr>
                 <?php $no++; ?>
               @endforeach
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
            var dokumen = data[0].url_dokumen;
            var tanggal_tanggap = data[0].tanggal_tanggap;

            // change date format
            var mydate = new Date(tanggal_tanggap);
            var tanggal_tanggap = mydate.toString("dd MMMM yyyy");

            var mydate = new Date(tanggal_pengaduan);
            var tanggal_pengaduan = mydate.toString("dd MMMM yyyy");

            // set
            $('span#judul_pengaduan').html(judul_pengaduan);
            $('span#tanggal_pengaduan').html(tanggal_pengaduan);
            $('div#isi_pengaduan').html(isi_pengaduan);
            if(tanggap!=null)
            {
              $('div#tanggapan').html(
                "<div class='box-footer box-comments' style='border:1px solid #00a65a;'>"+
                "<div style='padding-bottom:5px;'>"+
                "<b>Tanggapan</b>"+
                "</div>"+
                "<div class='box-comment'>"+
                "<img class='img-circle img-sm' src='{{asset('dist/img/user3-128x128.jpg')}}' alt='user image'>"+
                "<div class='comment-text'>"+
                "<span class='username'>"+
                nama_penanggap + " || Administrator SKPD " + nama_skpd +
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
  <script>
    $(function () {
      $("#tabeluser").DataTable();
    });
  </script>
@stop
