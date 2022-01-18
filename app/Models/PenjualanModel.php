<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table      = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $allowedFields = ['id_penjualan', 'id_produk', 'id_customer', 'tanggal_penjualan', 'status', 'id_transaksi'];

    public function getPenjualan()
    {
        $builder = $this->db->table('penjualan');
        $builder->join('customer', 'customer.id_customer=penjualan.id_customer');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getPenjualanTotal()
    {
        $builder = $this->db->table('penjualan');
        $query = $builder->countAllResults();
        return $query;
    }

    public function getById($id)
    {
        return $this->where(['id_penjualan' => $id])->first();
    }

    public function getCountData($id_penjualan)
    {
        $builder = $this->db->table('penjualan');
        $builder->where('penjualan.id_penjualan', $id_penjualan);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getIdPenjualan($id_customer)
    {
        $id_penjualan = '';
        $builder = $this->db->table('penjualan');
        $builder->select('id_penjualan');
        $builder->where('penjualan.id_customer', $id_customer);
        $query = $builder->get()->getResultArray();
        foreach ($query as $data) :
            $id_penjualan = $data['id_penjualan'];
        endforeach;

        return $id_penjualan;
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

    public function getTotalPenjualan($id_penjualan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->select('harga_satuan,jumlah_jual');
        $builder->where('id_penjualan', $id_penjualan);
        $query = $builder->get()->getResultArray();
        $total_harga = 0;
        foreach ($query as $data) :
            $total_harga += $data['harga_satuan'] * $data['jumlah_jual'];
        endforeach;

        return $total_harga;
    }


    public function getDetailPenjualan($id_penjualan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->join('penjualan', 'detail_penjualan.id_penjualan=penjualan.id_penjualan');
        $builder->join('customer', 'customer.id_customer=detail_penjualan.id_customer');
        $builder->join('produk', 'produk.id_produk=detail_penjualan.id_produk');
        $builder->where('detail_penjualan.id_penjualan', $id_penjualan);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getPrint($id_pemesanan)
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->join('penjualan', 'penjualan.id_penjualan=detail_penjualan.id_penjualan');
        $builder->join('customer', 'customer.id_customer=detail_penjualan.id_customer');
        $builder->where('penjualan.id_penjualan', $id_pemesanan);
        $builder->groupBy('penjualan.id_customer');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getLapPenjualan($month = '', $year = '')
    {
        $builder = $this->db->table('detail_penjualan');
        $builder->select("penjualan.id_penjualan,DATE_FORMAT(penjualan.tanggal_penjualan,'%Y-%m-%d') as tanggal_penjualan,detail_penjualan.jumlah_jual,detail_penjualan.harga_satuan,sum(detail_penjualan.jumlah_jual*detail_penjualan.harga_satuan) as total");
        $builder->join('penjualan', 'detail_penjualan.id_penjualan=penjualan.id_penjualan');
        $builder->where('month(tanggal_penjualan)', $month);
        $builder->where('year(tanggal_penjualan)', $year);
        $builder->groupBy('detail_penjualan.id_penjualan');
        $query = $builder->get();
        return $query->getResult();
    }


    public function code_penjualan_ID()
    {
        $builder = $this->db->table('penjualan');
        $builder->selectMax('id_penjualan', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_penjualan = 'PNJ-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_penjualan = $id_penjualan . $nomor;
        return $id_penjualan;
    }

    public function createPenjualan($data)
    {
        $query = $this->db->table('penjualan')->insert($data);
        return $query;
    }

    public function createDetailPenjualan($data)
    {
        $query = $this->db->table('detail_penjualan')->insert($data);
        return $query;
    }

    public function updatePenjualan($data, $id)
    {
        $query = $this->db->table('penjualan')->update($data, array('id_penjualan' => $id));
        return $query;
    }

    public function deletePenjualan($id)
    {
        $query = $this->db->table('penjualan')->delete(array('id_penjualan' => $id));
        return $query;
    }

    public function deleteDetailPenjualan($id)
    {
        $query = $this->db->table('detail_penjualan')->delete(array('id_detail_penjualan' => $id));
        return $query;
    }
}
