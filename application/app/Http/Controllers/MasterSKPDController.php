<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\MasterSKPD;
use DB;
use App\TopikAduan;
use App\Models\Pengaduan;
use App\Models\DokumenPengaduan;
use Excel;
use PHPExcel_Worksheet_PageSetup;

class MasterSKPDController extends Controller
{
    /**
    * Authentication controller.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $getskpd = MasterSKPD::paginate(10);
      $sql = DB::table('master_skpd')
              ->select('*')
              ->orderby('kode_skpd', 'desc')
              ->get();

        $number   = MasterSKPD::latest('created_at')->first();
        if($number == null)
        {
          $kodegenerate = '1';
        }else{
          $kodegenerate = substr($number->kode_skpd, 4)+1;
        }
      // return view('pages.dataskpd')->with('getskpd', $getskpd);
      return view('pages.dataskpd', compact('getskpd', 'kodegenerate'));
    }

    public function nonaktif($id)
    {
      $set = MasterSKPD::find($id);
      $set->flag_skpd = 0;
      $set->save();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil mengubah status SKPD.");
    }

    public function aktif($id)
    {
      $set = MasterSKPD::find($id);
      $set->flag_skpd = 1;
      $set->save();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil mengubah status SKPD.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $messages = [
        'kodeskpd.required' => 'Kode SKPD harus diisi.',
        'kodeskpd.unique' => 'Kode SKPD telah digunakan.',
        'namaskpd.required' => 'Nama SKPD harus diisi.',
      ];

      $validator = Validator::make($request->all(), [
        'kodeskpd' => 'required|unique:master_skpd,kode_skpd',
        'namaskpd' => 'required',
      ], $messages);

      if($validator->fails()) {
        return redirect()->route('dataskpd.index')->withErrors($validator)->withInput();
      }

      $tampung = $request->namaskpd;
      $slug = str_slug($tampung);

      $set = new MasterSKPD;
      $set->kode_skpd = $request->kodeskpd;
      $set->nama_skpd = $request->namaskpd;
      $set->slug      = $slug;
      $set->flag_skpd = $request->flagskpd;
      $set->save();

      return redirect()->route('dataskpd.index')->with('message', "Berhasil menambahkan data SKPD baru.");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $messages = [
          'kodeskpdedit.required' => 'Kode SKPD harus diisi.',
          'namaskpdedit.required' => 'Nama SKPD harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
          'kodeskpdedit' => 'required',
          'namaskpdedit' => 'required',
        ], $messages);

        if($validator->fails()) {
          return redirect()->route('dataskpd.index')->withErrors($validator)->withInput();
        }

        $tampung = $request->namaskpdedit;
        $slug = str_slug($tampung);

        $set = MasterSKPD::find($request->idskpd);
        $set->kode_skpd = $request->kodeskpdedit;
        $set->nama_skpd = $request->namaskpdedit;
        $set->slug      = $slug;
        $set->flag_skpd = $request->flagskpdedit;
        $set->save();

        return redirect()->route('dataskpd.index')->with('message', "Berhasil mengubah data SKPD.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $check = TopikAduan::where('id_skpd', $id)->count();
      if($check==0) {
        $set = MasterSKPD::find($id);
        $set->delete();

        return redirect()->route('dataskpd.index')->with('message', "Berhasil menghapus data SKPD.");
      } else {
        $set = MasterSKPD::find($id);
        return redirect()->route('dataskpd.index')->with('messageerror', "Data SKPD dengan nama $set->nama_skpd  tidak dapat dihapus karena telah memiliki data topik pengaduan.");
      }
    }

    public function bind($id)
    {
      $get = MasterSKPD::find($id);
      return $get;
    }

    public function getDataSKPD()
    {
      $get = DB::table('master_skpd')
                  ->leftJoin('topik_pengaduan', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                  ->leftJoin('pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                  ->select('master_skpd.kode_skpd', 'master_skpd.nama_skpd', DB::raw('count(pengaduan.id) as jumlahpengaduan'), 'master_skpd.flag_skpd', 'master_skpd.id')
                  ->groupBy('master_skpd.id')
                  ->get();

      return view('pages.listdataskpdbytopik')->with('getskpd', $get);
    }

    public function detailSKPD($id)
    {
      $getskpd = MasterSKPD::where('id', $id)->get();
      $gettopik = DB::table('topik_pengaduan')
                    ->select('topik_pengaduan.id', 'topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                    ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
                    ->where('topik_pengaduan.id_skpd', $id)
                    ->groupBy('topik_pengaduan.id')
                    ->paginate(5);
      $getbelumtanggap = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                      ->select(DB::raw('count(pengaduan.judul_pengaduan) as belumtanggap'))
                      ->where([['pengaduan.flag_tanggap', '=', '0'], ['master_skpd.id', '=', $id]])
                      ->first();
      $getsudahtanggap = DB::table('pengaduan')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                      ->select(DB::raw('count(pengaduan.judul_pengaduan) as sudahtanggap'))
                      ->where([['pengaduan.flag_tanggap', '=', '1'], ['master_skpd.id', '=', $id]])
                      ->first();
      $getpengaduan = DB::table('pengaduan')
                      ->leftJoin('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id')
                      ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                      ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('*', 'tanggapan.created_at as tanggaltanggap', 'pengaduan.created_at as tanggaladuan', 'pengaduan.id as pengaduanid')
                      ->where('master_skpd.id', $id)
                      ->orderby('pengaduan.created_at', 'desc')
                      ->get();

      return view('pages/topikbyskpd', compact('getskpd', 'gettopik', 'getbelumtanggap', 'getsudahtanggap', 'getpengaduan'));
    }

    public function bindfordetail($id)
    {
      $get = DB::table('pengaduan')
              ->join('users', 'pengaduan.warga_id' , '=', 'users.id')
              ->join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
              ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
              ->leftjoin('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id')
              ->leftjoin('dokumen_pengaduan', 'dokumen_pengaduan.pengaduan_id', '=', 'pengaduan.id')
              ->select('users.url_photo', 'pengaduan.id', 'users.nama', 'master_skpd.nama_skpd', 'pengaduan.judul_pengaduan', 'pengaduan.created_at as tanggal_pengaduan', 'tanggapan.created_at as tanggal_tanggap', 'pengaduan.isi_pengaduan', 'tanggapan.tanggapan', 'dokumen_pengaduan.url_dokumen')
              ->where('pengaduan.id', $id)
              ->get();

      return $get;
    }

    public function getdokumenpengaduan($id)
    {
      $get = DokumenPengaduan::where('pengaduan_id', $id)->get();
      return $get;
    }

    public function export($type)
    {
        $data = MasterSKPD::leftJoin('topik_pengaduan', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                            ->leftJoin('pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                            ->select('master_skpd.kode_skpd', 'master_skpd.nama_skpd', DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                            ->groupBy('master_skpd.id')
                            ->get()
                            ->toArray();

        return Excel::create('Topik Pengaduan Berdasarkan SKPD', function($excel) use($data){
          $excel->sheet('Jumlah Topik Pengaduan', function($sheet) use ($data)
          {
            $sheet->fromArray($data, null, 'A1', true);
            $sheet->row(1, array(' Kode SKPD', 'SKPD', 'Jumlah Pengaduan'));
            $sheet->cell('A1:C1', function($cell){
              $cell->setFontSize(12);
              $cell->setFontWeight('bold');
              $cell->setAlignment('center');
            });
            $sheet->setAllBorders('thin');
            $sheet->setFreeze('A2'); });
        })->download($type);
    }

    public function exportDetail($type, $id)
    {
        $data = MasterSKPD::leftJoin('topik_pengaduan', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                            ->leftJoin('pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                            ->select('master_skpd.kode_skpd', 'master_skpd.nama_skpd', DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                            ->groupBy('master_skpd.id')
                            ->get()
                            ->toArray();

        $getskpd = MasterSKPD::where('id', $id)->get();
        $topik = TopikAduan::select('topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', DB::raw('count(pengaduan.id) as jumlahpengaduan'))
                              ->join('pengaduan', "topik_pengaduan.id", '=', 'pengaduan.topik_id')
                              ->where('topik_pengaduan.id_skpd', $id)
                              ->groupBy('topik_pengaduan.id')
                              ->get()
                              ->toArray();
        $pengaduan = Pengaduan::leftJoin('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id')
                        ->join('topik_pengaduan', 'pengaduan.topik_id', '=', 'topik_pengaduan.id')
                        ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                        ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                        ->select('users.nama', 'topik_pengaduan.nama_topik', 'pengaduan.created_at as sempak', 'tanggapan.created_at', DB::raw('DATEDIFF(pengaduan.created_at,tanggapan.created_at) AS Days'), 'pengaduan.flag_tanggap')
                        ->where('master_skpd.id', $id)
                        ->orderby('pengaduan.created_at', 'desc')
                        ->get()
                        ->toArray();

        return Excel::create('Topik Pengaduan Berdasarkan SKPD', function($excel) use($topik, $pengaduan){
            $excel->sheet('Jumlah Topik Pengaduan', function($sheet) use ($topik)
            {
                $sheet->fromArray($topik, null, 'A1', true);
                $sheet->row(1, array('Kode Topik', 'Nama Topik', 'Jumlah Pengaduan'));
                $sheet->cell('A1:C1', function($cell){
                  $cell->setFontSize(12);
                  $cell->setFontWeight('bold');
                  $cell->setAlignment('center');
                });
                $sheet->setAllBorders('thin');
                $sheet->setFreeze('A2');
            });
            $excel->sheet('Data Pengaduan', function($sheet) use($pengaduan)
            {
                $sheet->fromArray($pengaduan, null, 'A1', true);
                $sheet->row(1, array('Pelapor', 'Topik Aduan', 'Tanggal Aduan', 'Tanggal Proses', 'Durasi Pemrosesan', 'Status Aduan'));
                $sheet->cell('A1:F1', function($cell){
                  $cell->setFontSize(12);
                  $cell->setFontWeight('bold');
                  $cell->setAlignment('center');
                });
                $sheet->setAllBorders('thin');
                $sheet->setFreeze('A2');
                $sheet->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            });
        })->download($type);
    }
}
