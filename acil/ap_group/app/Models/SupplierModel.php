<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table      = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $allowedFields = ['id_supplier', 'nama_supplier', 'alamat', 'no_telp'];

    public function rules()
    {
        return
            [
                'nama_supplier' =>
                [
                    'label'  => 'Nama Supplier',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
                    ],
                ],
                'alamat' =>
                [
                    'label'  => 'Alamat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon dipilih',
                    ],
                ],
                'no_telp' =>
                [
                    'label'  => 'No Telp',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }

    public function getSupplier()
    {
        return $this->findAll();
    }

    public function getById($id)
    {
        return $this->where(['id_supplier' => $id])->first();
    }


    public function code_supplier_ID()
    {
        $builder = $this->db->table('supplier');
        $builder->selectMax('id_supplier', 'code');
        $query = $builder->get()->getResult();
        foreach ($query as $data) :
            $jml_data = $data->code;
        endforeach;
        $id_supplier = 'SUP-';
        $code = substr($jml_data, -3);
        $nomor = str_pad(((int)$code + 1), 3, "0", STR_PAD_LEFT);
        $id_supplier = $id_supplier . $nomor;
        return $id_supplier;
    }

    public function createSupplier($data)
    {
        $query = $this->db->table('supplier')->insert($data);
        return $query;
    }

    public function updateSupplier($data, $id)
    {
        $query = $this->db->table('supplier')->update($data, array('id_supplier' => $id));
        return $query;
    }

    public function deleteSupplier($id)
    {
        $query = $this->db->table('supplier')->delete(array('id_supplier' => $id));
        return $query;
    }
}
