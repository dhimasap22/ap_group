<?php

namespace App\Controllers;

use \App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $validation;
    protected $supplierModel;

    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title'                 => 'Data Supplier',
            'supplier'             => $this->supplierModel->getSupplier(),
        ];
        return view('supplier/view_data_supplier', $data);
    }

    public function add()
    {
        $data = [
            'title'                 => 'Tambah Data Supplier',
            'id_supplier'           => $this->supplierModel->code_supplier_ID(),
            'supplier'             => $this->supplierModel->getSupplier(),

        ];
        return view('supplier/add_data_supplier', $data);
    }

    public function create()
    {
        $data = [
            'title'                 => 'Tambah Data Supplier',
            'id_supplier'           => $this->supplierModel->code_supplier_ID(),
            'supplier'             => $this->supplierModel->getSupplier(),

        ];
        $this->validation->setRules($this->supplierModel->rules());
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'id_supplier' => $this->supplierModel->code_supplier_ID(),
                'nama_supplier' => $this->request->getPost('nama_supplier'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
            );
            $this->supplierModel->createSupplier($data);
            session()->setFlashdata('success', 'Data Supplier Berhasil Ditambahkan');
            return redirect()->to('/supplier');
        } else {
            $data['validation'] = $this->validation;
            return view('supplier/add_data_supplier', $data);
        }
    }

    public function edit($id_supplier)
    {
        $data = [
            'title'                 => 'Edit Data Supplier',
            'supplier'              => $this->supplierModel->where('id_supplier', $id_supplier)->first()
        ];
        $this->validation->setRules(['nama_supplier' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $data = array(
                'nama_supplier' => $this->request->getPost('nama_supplier'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
            );
            $this->supplierModel->updateSupplier($data, $id_supplier);
            session()->setFlashdata('success', 'Data Supplier Berhasil Diubah');

            return redirect()->to('/supplier');
        }

        return view('supplier/edit_data_supplier', $data);
    }

    public function delete()
    {
        $id = $this->request->getPost('id_supplier');
        $this->supplierModel->deleteSupplier($id);
        session()->setFlashdata('success', 'Data Supplier Berhasil Dihapus');

        return redirect()->to('/supplier');
    }
}
