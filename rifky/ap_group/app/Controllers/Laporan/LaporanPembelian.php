<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\PembelianModel;


class LaporanPembelian extends BaseController
{
    protected $pembelianModel;

    public function __construct()
    {
        $this->pembelianModel = new PembelianModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Laporan Pembelian',
            'lap_pembelian'      => $this->pembelianModel->getLapPembelian(),
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_lap_pembelian', $data);
    }

    public function show_data_lap_pembelian()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);

        $data = [
            'title'             => 'Laporan Pembelian',
            'lap_pembelian'     => $this->pembelianModel->getLapPembelian($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_lap_pembelian', $data);
    }
}
