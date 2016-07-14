<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\MasterSKPD;
use App\TopikAduan;
use App\Models\Pengaduan;
use Excel;

class TopikAduanController extends Controller
{
    public function index()
    {
      $getskpd = MasterSKPD::where('flag_skpd', '1')->get();
      $gettopik = TopikAduan::paginate(10);

      return view('pages.topikpengaduan', compact('getskpd', 'gettopik'));
    }

    public function store(Request $request)
    {
      $messages = [
        'kodepengaduan.required' => 'Kode Pengaduan harus diisi.',
        'kodepengaduan.unique' => 'Kode Pengaduan telah digunakan.',
        'namapengaduan.required' => 'Nama Pengaduan harus diisi.',
        'idskpd.required' => 'SKPD harus dipilih.',
        'idskpd.not_in' => 'SKPD harus dipilih.',
      ];

      $validator = Validator::make($request->all(), [
        'kodepengaduan' => 'required|unique:topik_pengaduan,kode_topik',
        'namapengaduan' => 'required',
        'idskpd' => 'required|not_in:-- Pilih --',
      ], $messages);

      if($validator->fails()) {
        return redirect()->route('topikpengaduan.index')->withErrors($validator)->withInput();
      }

      $set = new TopikAduan;
      $set->kode_topik = $request->kodepengaduan;
      $set->nama_topik = $request->namapengaduan;
      $set->id_skpd = $request->idskpd;
      $set->save();

      return redirect()->route('topikpengaduan.index')->with('message', "Berhasil menambahkan topik pengaduan baru.");
    }

    public function delete($id)
    {
      $check = Pengaduan::where('topik_id', $id)->count();
      if($check==0) {
        $set = TopikAduan::find($id);
        $set->delete();

        return redirect()->route('topikpengaduan.index')->with('message', "Berhasil menghapus topik pengaduan.");
      } else {
        $set = TopikAduan::find($id);
        return redirect()->route('topikpengaduan.index')->with('messageerror', "Topik pengaduan dengan nama $set->nama_topik tidak dapat dihapus karena telah memiliki data pengaduan warga.");
      }
    }

    public function bind($id)
    {
      $get = TopikAduan::find($id);
      return $get;
    }

    public function update(Request $request)
    {
      $messages = [
        'kode_topik.required' => 'Kode Pengaduan harus diisi.',
        'nama_topik.required' => 'Nama Pengaduan harus diisi.',
      ];

      $validator = Validator::make($request->all(), [
        'kode_topik' => 'required',
        'nama_topik' => 'required',
      ], $messages);

      if($validator->fails()) {
        return redirect()->route('topikpengaduan.index')->withErrors($validator)->withInput();
      }

      $set = TopikAduan::find($request->id_topik);
      $set->kode_topik = $request->kode_topik;
      $set->nama_topik = $request->nama_topik;
      $set->id_skpd = $request->id_skpd;
      $set->save();

      return redirect()->route('topikpengaduan.index')->with('message', "Berhasil mengubah topik pengaduan.");
    }

    public function export($type)
    {
        $data = TopikAduan::join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                            ->select('topik_pengaduan.kode_topik', 'topik_pengaduan.nama_topik', 'master_skpd.nama_skpd')
                            ->orderby('master_skpd.nama_skpd', 'asc')
                            ->get()
                            ->toArray();

        return Excel::create('Topik Pengaduan SIMPEDU', function($excel) use($data){
          $excel->sheet('Topik Pengaduan', function($sheet) use ($data)
          {
            $sheet->fromArray($data);
            $sheet->row(1, array('Kode Topik', 'Topik Pengaduan','SKPD'));
            $sheet->cell('A1:C1', function($cell){
              $cell->setFontSize(12);
              $cell->setFontWeight('bold');
              $cell->setAlignment('center');
            });
            $sheet->setAllBorders('thick');
            $sheet->setFreeze('A2');
          });
        })->download($type);
    }
}
