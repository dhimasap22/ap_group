<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\LabaRugiModel;
use \App\Models\CoaModel;


class LabaRugi extends BaseController
{
    protected $labaRugiModel;
    protected $coaModel;

    public function __construct()
    {
        $this->labaRugiModel = new LabaRugiModel();
        $this->coaModel = new CoaModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Laba Rugi',
            'pendapatans'            => [],
            'pendapatan_bulan_lalu ' => [],
            'beban'                 => [],
            'beban_bulan_lalu '     => [],
            'date'                  => '',
            'year'                  => '',
            'id_akun'               => ''
        ];
        // dd($data);
        return view('laporan/view_data_laba_rugi', $data);
    }

    public function show_data_laba_rugi()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);
        $newdate = date("Y-m", strtotime("-1 months", $time));
        $month_bef = substr($newdate, -2);
        $year_bef = substr($newdate, 0, -3);

        $data = [
            'title'                         => 'Laba Rugi',
            'pendapatans'                    => $this->labaRugiModel->getJurnalPendapatan($month, $year),
            'pendapatan_bulan_lalu'         => $this->labaRugiModel->getJurnalPendapatanBulanLalu($month_bef, $year_bef),
            'beban'                         => $this->labaRugiModel->getJurnalBeban($month, $year),
            'beban_bulan_lalu'              => $this->labaRugiModel->getJurnalBebanBulanLalu($month_bef, $year_bef),
            'date'                          => $bulan,
            'year'                          => $year
        ];

        // dd($data);

        return view('laporan/view_data_laba_rugi', $data);
    }
}
