<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'nama', 'password', 'kelompok', 'image'];

    public function cek_login($username, $password)
    {
        return $this->db->table('user')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }

    public function rules()
    {
        return
            [
                'username' =>
                [
                    'label'  => 'Username',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'nama' =>
                [
                    'label'  => 'Nama',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'password' =>
                [
                    'label'  => 'Password',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'kelompok' =>
                [
                    'label'  => 'Kelompok',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'image' =>
                [
                    'label'  => 'Gambar Profil',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
            ];
    }

    public function getUser()
    {
        return $this->findAll();
    }

    public function createUser($data)
    {
        $query = $this->db->table('user')->insert($data);
        return $query;
    }

    public function updateUser($data, $id_user)
    {
        $query = $this->db->table('user')->update($data, array('id_user' => $id_user));
        return $query;
    }
}
