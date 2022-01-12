<?php

namespace App\Controllers;

use Myth\Auth\Authorization\GroupModel;
use \App\Models\ProdukModel;


// use \Myth\Auth\Entities\User;

class Frontend extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    function user()
    {
        $authenticate = service('authentication');
        $authenticate->check();
        return $authenticate->user();
    }

    public function index()
    {
        $data = [
            'title'             => 'Toko Serbaunik',
            'produk'            => $this->produkModel->getProduk(),
        ];

        return view('frontend/index', $data);
    }
}
