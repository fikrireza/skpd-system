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
    // $this->middleware('isWarga');
  }

  public function index()
  {
    $pengaduan = Pengaduan::count();
    $ditanggapi = Pengaduan::where('flag_tanggap', 1)->count();
    $blmtanggapi = Pengaduan::where('flag_tanggap', 0)->count();

    return view('admin.historipengaduan', compact('pengaduan', 'ditanggapi', 'blmtanggapi'));
  }

  public function getApi(Request $request)
  {
    $years = $request->input('years');

    $post3 = DB::select('select temp.bulan,
                        		IFNULL(tbl_pengaduan.jumlah_pengaduan, "0") as jumlah_pengaduan,
                        		IFNULL(tbl_tanggap.jumlah_tanggap, "0") as jumlah_tanggap,
                        		IFNULL(tbl_blm_tanggap.jumlah_blm_tanggap, "0") as jumlah_blm_tanggap
                        FROM (select DISTINCT DATE_FORMAT(created_at, "%b") as bulan FROM pengaduan WHERE DATE_FORMAT(created_at, "%Y") = "'.$years.'" ORDER BY bulan desc)as temp
                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_pengaduan, DATE_FORMAT(created_at, "%b") as month_pengaduan
                        			FROM pengaduan
                              WHERE DATE_FORMAT(created_at, "%Y") = "'.$years.'"
                        			GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_pengaduan
                        		ON tbl_pengaduan.month_pengaduan = temp.bulan

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_tanggap, DATE_FORMAT(created_at, "%b") as month_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "1"
                                AND DATE_FORMAT(created_at, "%Y") = "'.$years.'"
                        			 GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_tanggap
                        		ON tbl_tanggap.month_tanggap = temp.bulan

                        		LEFT OUTER JOIN (SELECT COUNT(*) as jumlah_blm_tanggap, DATE_FORMAT(created_at, "%b") as month_blm_tanggap
                        			 FROM pengaduan
                        			 WHERE flag_tanggap = "0"
                                AND DATE_FORMAT(created_at, "%Y") = "'.$years.'"
                        			 GROUP BY DATE_FORMAT(created_at, "%b")) as tbl_blm_tanggap
                        		ON tbl_blm_tanggap.month_blm_tanggap = temp.bulan');
    $toChart = json_encode($post3);
    //dd($toChart);
    return $toChart;
  }
}
