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

class HistoriPengaduanController extends Controller
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

  public function index()
  {
    $pengaduan = Pengaduan::count();
    $ditanggapi = Pengaduan::where('flag_tanggap', 1)->count();
    $blmtanggapi = Pengaduan::where('flag_tanggap', 0)->count();

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

    if($years == "semua"){
      $toChart = json_encode($tahun);
    }else{
      $toChart = json_encode($bulan);
    }

    return $toChart;
  }
}
