<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table      = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    protected $allowedFields = ['id_pembelian', 'id_supplier', 'tanggal_pembelian', 'status', 'id_transaksi'];

    public function getPembelian()
    {
        $builder = $this->db->table('pembelian');
        $builder->join('supplier', 'supplier.id_supplier=pembelian.id_supplier');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getById($id)
    {
        return $this->where(['id_pembelian' => $id])->first();
    }

    public function getCountData($id_pembelian)
    {
        $builder = $this->db->table('pembelian');
        $builder->where('pembelian.id_pembelian', $id_pembelian);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getHargaProduk($id_produk)
    {
        $builder = $this->db->table('produk');
        $builder->select('harga');
        $builder->where('id_produk', $id_produk);
        $query = $builder->get()->getResultArray();
        foreach ($query as $data) :
            $harga_satuan = $data['harga'];
        endforeach;

        return $harga_satuan;
    }

    public function getTotalPembelian($id_pembelian)
    {
        $builder = $this->db->table('detail_pembelian');
        $builder->select('harga_satuan,jumlah_beli');
        $builder->where('id_pembelian', $id_pembelian);
        $query = $builder->get()->getResultArray();
        $total_harga = 0;
        foreach ($query as $data) :
            $total_harga += $data['harga_satuan'] * $data['jumlah_beli'];
        endforeach;

        return $total_harga;
    }

    public function getDetailPembelian($id_pembelian)
    {
        $builder = $this->db->table('detail_pembelian');
        $builder->join('pembelian', 'detail_pembelian.id_pembelian=pembelian.id_pembelian');
        $builder->join('supplier', 'supplier.id_supplier=detail_pembelian.id_supplier');
        $builder->join('produk', 'produk.id_produk=detail_pembelian.id_produk');
        $builder->where('detail_pembelian.id_pembelian', $id_pembelian);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getLapPembelian($month = '', $year = '')
    {
        $builder = $this->db->table('detail_pembelian');
        $builder->select("pembelian.id_pembelian,DATE_FORMAT(pembelian.tanggal_pembelian,'%Y-%m-%d') as tanggal_pembelian,detail_pembelian.jumlah_beli,detail_pembelian.harga_satuan,sum(detail_pembelian.jumlah_beli*detail_pembelian.harga_satuan) as total");
        $builder->join('pembelian', 'detail_pembelian.id_pembelian=pembelian.id_pembelian');
        $builder->where('month(tanggal_pembelian)', $month);
        $builder->where('year(tanggal_pembelian)', $year);
        $builder->groupBy('detail_pembelian.id_pembelian');
        $query = $builder->get();
        return $query->getResult();
    }

    public function code_pembelian_ID()
    {
        $builder = $this->db->table('pembelian');
        $builder->selectMax('id_pembelian', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_pembelian = 'PMB-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_pembelian = $id_pembelian . $nomor;
        return $id_pembelian;
    }

    public function createPembelian($data)
    {
        $query = $this->db->table('pembelian')->insert($data);
        return $query;
    }

    public function createDetailPembelian($data)
    {
        $query = $this->db->table('detail_pembelian')->insert($data);
        return $query;
    }

    public function updatePembelian($data, $id)
    {
        $query = $this->db->table('pembelian')->update($data, array('id_pembelian' => $id));
        return $query;
    }

    public function deletePembelian($id)
    {
        $query = $this->db->table('pembelian')->delete(array('id_pembelian' => $id));
        return $query;
    }

    public function deleteDetailPembelian($id)
    {
        $query = $this->db->table('detail_pembelian')->delete(array('id_detail_pembelian' => $id));
        return $query;
    }
}
