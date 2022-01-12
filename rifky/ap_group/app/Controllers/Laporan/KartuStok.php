<?php

namespace App\Controllers\Laporan;

use App\Controllers\BaseController;
use \App\Models\Laporan\KartuStokModel;


class KartuStok extends BaseController
{
    protected $kartustokModel;

    public function __construct()
    {
        $this->kartustokModel = new KartuStokModel();
    }

    public function index()
    {
        $data = [
            'title'             => 'Kartu Stok',
            'kartu_stok'        => $this->kartustokModel->getKartuStok(),
            'date'              => '',
            'year'              => ''
        ];

        return view('laporan/view_data_kartu_stok', $data);
    }

    public function show_data_kartu_stok()
    {
        $start_date = date("Y-m-d", strtotime($this->request->getPost('start_date')));;
        $time = strtotime($start_date);
        $month = date("m", $time);
        $year = date("Y", $time);
        $bulan = date("F", $time);

        $data = [
            'title'             => 'Kartu Stok',
            'kartu_stok'      => $this->kartustokModel->getKartuStok($month, $year),
            'date'              => $bulan,
            'year'              => $year
        ];

        return view('laporan/view_data_kartu_stok', $data);
    }
}
