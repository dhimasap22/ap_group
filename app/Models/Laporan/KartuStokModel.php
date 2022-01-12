<?php

namespace App\Models\Laporan;

use CodeIgniter\Model;

class KartuStokModel extends Model
{
    protected $table      = 'kartu_stok';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_stok', 'id_produk', 'tanggal'];

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getKartuStok($month = '', $year = '')
    {
        $builder = $this->db->table('kartu_stok');
        $builder->select('*');
        $builder->where('month(tanggal)', $month);
        $builder->where('year(tanggal)', $year);
        $builder->orderBy('id', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }
}
