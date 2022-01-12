<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->userModel = new UserModel();
		$this->session = \Config\Services::session();
	}

	public function index()
	{
		return view('auth/login');
	}

	public function cek_login()
	{
		$username   = $this->request->getPost('username');
		$password   = $this->request->getPost('password');

		$cek = $this->userModel->cek_login($username, $password);

		if (isset($cek['username']) && isset($cek['password'])) {
			session()->set([
				'username' => $cek['username'],
				'name' => $cek['nama'],
				'image' => $cek['image'],
				'kelompok' => $cek['kelompok']
			]);
			return redirect()->to(base_url('/home',));
		} else {
			session()->setFlashdata('warning', 'Username atau password salah');
			return redirect()->to(base_url('/'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/'));
	}
}
