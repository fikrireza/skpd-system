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
            <span class='username'><a href="#">
              @if(isset($data['binddatapengaduan']))
                {{$data['binddatapengaduan']->user->nama}}
              @else
                Nama Pengaduan
              @endif
            </a></span>
            <span class='description'>
              @if(isset($data['binddatapengaduan']))
                {{$data['binddatapengaduan']->created_at}}
              @else
                Tanggal Pengaduan
              @endif
              |
              @if(isset($data['binddatapengaduan']))
                {{$data['binddatapengaduan']->topik->nama_topik}}
              @else
                Topik Pengaduan
              @endif
           </span>
          </div><!-- /.user-block -->
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
            <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class='box-body'>
          <!-- post text -->
          <p>
            @if(isset($data['binddatapengaduan']))
              {{$data['binddatapengaduan']->judul_pengaduan}}
            @else
              Judul Pengaduan
            @endif
          </p>
          <p style="text-align:justify">
            @if(isset($data['binddatapengaduan']))
              {{$data['binddatapengaduan']->isi_pengaduan}}
            @else
              Isi Pengaduan
            @endif
          </p>
          {{-- <!-- Attachment -->
          <div class="attachment-block clearfix">
            <b>Data Pendukung</b><br>
            <i class="text-muted">gambar.jpg</i>
            <div class="pull-right">
              <button class="btn btn-default btn-sm btn-flat">Download Data Pendukung</button>
            </div>
          </div><!-- /.attachment-block --> --}}

        </div><!-- /.box-body -->
        <div class="box-footer">
          @if(isset($data['binddatapengaduan']))
            {!! Form::model($data['binddatapengaduan'], ['route' => ['tanggap.update', $data['binddatapengaduan']->id], 'method' => "patch", 'class'=>'form-horizontal' , 'onsubmit'=>"return cekFile()" , 'name'=>"cekFrom"]) !!}
          @else
            <form class="form-horizontal" method="post" action="#">
          @endif
            {!! csrf_field() !!}
            <img class="img-responsive img-circle img-sm" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="alt text">
            <!-- .img-push is used to add margin to elements next to floating images -->
            <div class="img-push">
              <input
                @if(isset($data['binddatapengaduan']))
                  value="{{$data['binddatapengaduan']->id}}"
                @endif
                type="hidden" name="id" class="form-control" readonly="true"
                @if(!$errors->has('id'))
                 value="{{ old('id') }}"
                @endif
              >
              <br>
                <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."></textarea>
            <div class="footer pull-right" style="padding-top:5px;">
                @if(isset($data['binddatapengaduan']))
                  <button class="btn btn-primary btn-sm btn-flat">Kirim Tanggapan</button>
                @elseif(isset($data['binddatatanggapan']))
                  <button class="btn btn-primary btn-sm btn-flat" disabled="true">Kirim Tanggapan</button>
                @endif
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
            <?php
              $no;
              if($data['getdatapengaduan']->currentPage()==1)
                $no = 1;
              else
                $no = (($data['getdatapengaduan']->currentPage() - 1) * $data['getdatapengaduan']->perPage())+1;
            ?>
            @if($data['getdatapengaduan']->isEmpty())
              <tr>
                <td colspan="5" class="text-muted" style="text-align:center;"><i>Data Pengaduan tidak tersedia.</i></td>
              </tr>
            @elseif(isset($data['getdatapengaduan']))
              @foreach($data['getdatapengaduan'] as $key)
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $key->user->nama }}</td>
                  <td>{{ $key->topik->nama_topik }}</td>
                  <td>{{ $key->created_at }}</td>
                  <td>
                    @if($key->flag_tanggap==0)
                      <a class="btn btn-xs btn-warning" href="{{ route('tanggap.edit', $key->id) }}">Belum Ditanggapi</a></td>
                    @elseif($key->flag_tanggap==1)
                      <a class="btn btn-xs btn-success" href="{{ route('tanggap.show', $key->id) }}">Sudah Ditanggapi</a></td>
                    @endif
                </tr>
                <?php $no++; ?>
              @endforeach
            @endif
          </table>
        </div>
        <div class="box-footer">
          <div class="pagination pagination-sm no-margin pull-right">
            {{ $data['getdatapengaduan']->links() }}
          </div>
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
  <script>
  function cekFile() {
     var cek = document.forms['cekFrom']['tanggapan'].value;
       if(cek==null || cek=="")
       {
         alert("Form harus di isi !!!");
         return false;
       }
  }
 </script>
 <script>
   window.setTimeout(function() {
     $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove();
     });
   }, 2000);
 </script>
@stop
