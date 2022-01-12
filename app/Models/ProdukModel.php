<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_produk', 'nama_produk', 'jenis_produk', 'stok'];

    public function rules()
    {
        return
            [
                'nama_produk' =>
                [
                    'label'  => 'Nama Produk',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'jenis_produk' =>
                [
                    'label'  => 'Jenis Produk',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'stok' =>
                [
                    'label'  => 'Stok',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }

    public function getProduk()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_produk' => $id])->first();
    }

    public function getListProduk()
    {
        $builder = $this->db->table('produk');
        $query   = $builder->get();
        return $query->getResultArray();
    }

    public function code_produk_ID()
    {
        $builder = $this->db->table('produk');
        $builder->selectMax('id_produk', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_produk = 'PRD-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_produk = $id_produk . $nomor;
        return $id_produk;
    }

    public function createProduk($data)
    {
        $query = $this->db->table('produk')->insert($data);
        return $query;
    }

    public function updateProduk($data, $id)
    {
        $query = $this->db->table('produk')->update($data, array('id_produk' => $id));
        return $query;
    }

    public function deleteProduk($id)
    {
        $query = $this->db->table('produk')->delete(array('id_produk' => $id));
        return $query;
    }
}
