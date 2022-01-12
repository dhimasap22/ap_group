<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\PenjualanModel;


class LaporanPenjualan extends BaseController
{
    protected $penjualanModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Laporan Penjualan',
            'lap_penjualan'      => $this->penjualanModel->getLapPenjualan(),
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_lap_penjualan', $data);
    }

    public function show_data_lap_penjualan()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);

        $data = [
            'title'             => 'Laporan Penjualan',
            'lap_penjualan'     => $this->penjualanModel->getLapPenjualan($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_lap_penjualan', $data);
    }
}
