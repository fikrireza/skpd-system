<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Pengaduan;
use App\MasterSKPD;
use App\TopikAduan;
use DB;
use Carbon;
use Validator;
use Datatables;
use Excel;
use PHPExcel_Worksheet_Drawing;
use PHPExcel_Worksheet_PageSetup;

class HistoriPengaduanController extends Controller
{
  /**
   * Authentication controller.
   *
   * @return void
   */
  public function __construct()
  {
    // $this->middleware('isAdmin');
  }

  public function index()
  {
    $tahun = date('Y');
    // dd($tahun);
    $pengaduan = Pengaduan::whereYear('created_at', '=', date('Y'))->count();
    $ditanggapi = Pengaduan::where('flag_tanggap', 1)->whereYear('created_at', '=', date('Y'))->count();
    $blmtanggapi = Pengaduan::where('flag_tanggap', 0)->whereYear('created_at', '=', date('Y'))->count();

    return view('admin.historipengaduan', compact('pengaduan', 'ditanggapi', 'blmtanggapi'));
  }

  /**
   * Get data ajax for chart
   *
   * @return ajax
   */
  public function getApi(Request $request)
  {
    $years = $request->input('years');

    $tahun = DB::select('select temp.filters,
                        		IFNULL(tbl_pengaduan.jumlah_pengaduan, "0") as jumlah_pengaduan,
                        		IFNULL(tbl_tanggap.jumlah_tanggap, "0") as jumlah_tanggap,
                        		IFNULL(tbl_blm_tanggap.jumlah_blm_tanggap, "0") as jumlah_blm_tanggap
                        FROM (select DISTINCT DATE_FORMAT(created_at, "%Y") as filters FROM pengaduan ORDER BY filters desc)as temp
                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_pengaduan, DATE_FORMAT(created_at, "%Y") as tahun_pengaduan
                        			FROM pengaduan
                        			GROUP BY DATE_FORMAT(created_at, "%Y")) as tbl_pengaduan
                        		ON tbl_pengaduan.tahun_pengaduan = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_tanggap, DATE_FORMAT(created_at, "%Y") as tahun_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "1"
                        			 GROUP BY DATE_FORMAT(created_at, "%Y")) as tbl_tanggap
                        		ON tbl_tanggap.tahun_tanggap = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_blm_tanggap, DATE_FORMAT(created_at, "%Y") as tahun_blm_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "0"
                        			 GROUP BY DATE_FORMAT(created_at, "%Y")) as tbl_blm_tanggap
                        		ON tbl_blm_tanggap.tahun_blm_tanggap = temp.filters');

    $bulan = DB::select('select temp.filters,
                        		IFNULL(tbl_pengaduan.jumlah_pengaduan, "0") as jumlah_pengaduan,
                        		IFNULL(tbl_tanggap.jumlah_tanggap, "0") as jumlah_tanggap,
                        		IFNULL(tbl_blm_tanggap.jumlah_blm_tanggap, "0") as jumlah_blm_tanggap
                        FROM (select DISTINCT DATE_FORMAT(created_at, "%b") as filters FROM pengaduan WHERE DATE_FORMAT(created_at, "%Y") = "'.$years.'" ORDER BY filters desc)as temp
                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_pengaduan, DATE_FORMAT(created_at, "%b") as month_pengaduan
                        			FROM pengaduan
                              WHERE DATE_FORMAT(created_at, "%Y") = "'.$years.'"
                        			GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_pengaduan
                        		ON tbl_pengaduan.month_pengaduan = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_tanggap, DATE_FORMAT(created_at, "%b") as month_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "1"
                                AND DATE_FORMAT(created_at, "%Y") = "'.$years.'"
                        			 GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_tanggap
                        		ON tbl_tanggap.month_tanggap = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_blm_tanggap, DATE_FORMAT(created_at, "%b") as month_blm_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "0"
                                AND DATE_FORMAT(created_at, "%Y") = "'.$years.'"
                        			 GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_blm_tanggap
                        		ON tbl_blm_tanggap.month_blm_tanggap = temp.filters');

    $kosong = array(["filters" => "2017", "jumlah_pengaduan" => "0", "jumlah_tanggap" => "0", "jumlah_blm_tanggap" => "0"]);

    if($years == "semua"){
      $toChart = json_encode($tahun);
    }
    elseif($bulan == null){
      $toChart = json_encode($kosong);
    }
    else{
      $toChart = json_encode($bulan);
    }

    return $toChart;
  }

  public function downloadExcel($type, $year)
  {
    $data = Pengaduan::join('topik_pengaduan', 'topik_pengaduan.id', '=', 'pengaduan.topik_id')
                      ->join('master_skpd', 'master_skpd.id', '=', 'topik_pengaduan.id_skpd')
                      ->join('users', 'users.id', '=', 'pengaduan.warga_id')
                      ->select('users.nama','pengaduan.judul_pengaduan', 'topik_pengaduan.nama_topik', 'master_skpd.nama_skpd')
                      ->whereYear('pengaduan.created_at', '=', $year)
                      ->orderby('pengaduan.created_at', 'desc')
                      ->get()
                      ->toArray();

    $tahun = DB::select('select temp.filters,
                        		IFNULL(tbl_pengaduan.jumlah_pengaduan, "0") as jumlah_pengaduan,
                        		IFNULL(tbl_tanggap.jumlah_tanggap, "0") as jumlah_tanggap,
                        		IFNULL(tbl_blm_tanggap.jumlah_blm_tanggap, "0") as jumlah_blm_tanggap
                        FROM (select DISTINCT DATE_FORMAT(created_at, "%Y") as filters FROM pengaduan ORDER BY filters desc)as temp
                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_pengaduan, DATE_FORMAT(created_at, "%Y") as tahun_pengaduan
                        			FROM pengaduan
                        			GROUP BY DATE_FORMAT(created_at, "%Y")) as tbl_pengaduan
                        		ON tbl_pengaduan.tahun_pengaduan = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_tanggap, DATE_FORMAT(created_at, "%Y") as tahun_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "1"
                        			 GROUP BY DATE_FORMAT(created_at, "%Y")) as tbl_tanggap
                        		ON tbl_tanggap.tahun_tanggap = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_blm_tanggap, DATE_FORMAT(created_at, "%Y") as tahun_blm_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "0"
                        			 GROUP BY DATE_FORMAT(created_at, "%Y")) as tbl_blm_tanggap
                        		ON tbl_blm_tanggap.tahun_blm_tanggap = temp.filters');
    $tahun = json_decode(json_encode($tahun), true);

    $bulan = DB::select('select temp.filters,
                        		IFNULL(tbl_pengaduan.jumlah_pengaduan, "0") as jumlah_pengaduan,
                        		IFNULL(tbl_tanggap.jumlah_tanggap, "0") as jumlah_tanggap,
                        		IFNULL(tbl_blm_tanggap.jumlah_blm_tanggap, "0") as jumlah_blm_tanggap
                        FROM (select DISTINCT DATE_FORMAT(created_at, "%b") as filters FROM pengaduan WHERE DATE_FORMAT(created_at, "%Y") = "'.$year.'" ORDER BY filters desc)as temp
                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_pengaduan, DATE_FORMAT(created_at, "%b") as month_pengaduan
                        			FROM pengaduan
                              WHERE DATE_FORMAT(created_at, "%Y") = "'.$year.'"
                        			GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_pengaduan
                        		ON tbl_pengaduan.month_pengaduan = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_tanggap, DATE_FORMAT(created_at, "%b") as month_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "1"
                                AND DATE_FORMAT(created_at, "%Y") = "'.$year.'"
                        			 GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_tanggap
                        		ON tbl_tanggap.month_tanggap = temp.filters

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_blm_tanggap, DATE_FORMAT(created_at, "%b") as month_blm_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "0"
                                AND DATE_FORMAT(created_at, "%Y") = "'.$year.'"
                        			 GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_blm_tanggap
                        		ON tbl_blm_tanggap.month_blm_tanggap = temp.filters');
    $bulan = json_decode(json_encode($bulan), true);

    return Excel::create('Export SIMPEDU', function($excel) use($tahun, $bulan, $year, $data){
      $excel->sheet('Histori Pengaduan', function($sheet) use ($tahun)
      {
        $sheet->fromArray($tahun, null, 'A3', true);
        $sheet->mergeCells('A1:D2');
        $sheet->row(1, array('Laporan Pengaduan SIMPEDU'));
        $sheet->row(3, array('Tahun','Jumlah Pengaduan','Jumlah Tanggapan','Jumlah Belum Ditanggapi'));
        $sheet->cell('A1:D3', function($cell){
          $cell->setFontSize(12);
          $cell->setFontWeight('bold');
          $cell->setAlignment('center');
          $cell->setValignment('center');
        });
        $sheet->setAllBorders('thin');
        $sheet->setFreeze('A4');
        $objDrawing = new PHPExcel_Worksheet_Drawing;
        $objDrawing->setPath('images/logokabtangerang.png');
        $objDrawing->setCoordinates('B1');
        $objDrawing->setWorksheet($sheet);
      });

      $excel->sheet('Histori Pengaduan '.$year, function($sheet) use ($bulan)
      {
        $sheet->fromArray($bulan, null, 'A3', true);
        $sheet->mergeCells('A1:D2');
        $sheet->row(1, array('Laporan Pengaduan SIMPEDU'));
        $sheet->row(3, array('Tahun','Jumlah Pengaduan','Jumlah Tanggapan','Jumlah Belum Ditanggapi'));
        $sheet->cell('A1:D3', function($cell){
          $cell->setFontSize(12);
          $cell->setFontWeight('bold');
          $cell->setAlignment('center');
          $cell->setValignment('center');
        });
        $sheet->setAllBorders('thin');
        $sheet->setFreeze('A4');
        $objDrawing = new PHPExcel_Worksheet_Drawing;
        $objDrawing->setPath('images/logokabtangerang.png');
        $objDrawing->setCoordinates('B1');
        $objDrawing->setWorksheet($sheet);
      });

      $excel->sheet('Detail Pengaduan '.$year, function($sheet) use ($data)
      {
        $sheet->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->fromArray($data, null, 'A3', true);
        $sheet->mergeCells('A1:D2');
        $sheet->row(1, array('Laporan Pengaduan SIMPEDU'));
        $sheet->row(3, array('Nama Pengadu','Judul Pengaduan','Topik Pengaduan','SKPD'));
        $sheet->cell('A1:D3', function($cell){
          $cell->setFontSize(12);
          $cell->setFontWeight('bold');
          $cell->setAlignment('center');
          $cell->setValignment('center');
        });
        $sheet->setAllBorders('thin');
        $sheet->setFreeze('A4');
        $objDrawing = new PHPExcel_Worksheet_Drawing;
        $objDrawing->setPath('images/logokabtangerang.png');
        $objDrawing->setCoordinates('B1');
        $objDrawing->setWorksheet($sheet);
      });
    })->download($type);
  }

}
