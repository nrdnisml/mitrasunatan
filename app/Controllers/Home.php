<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PasienModel;

class Home extends BaseController
{

	public function __construct()
	{
		$this->pasien = new PasienModel();
		$this->paket = new PaketModel();
	}

	public function index()
	{
		$data = [
			'pasien' => $this->pasien->findAll(),
			'paket' => $this->paket->findAll(),
			'n_paket' => $this->db->table('paket')->select('id')->countAllResults(),
			'n_pasien' => $this->db->table('pasien')->select('id')->countAllResults(),
			'n_kunjungan' => $this->db->table('kunjungan')->select('id')->countAllResults(),
		];
		return view('frontend/index', $data);
	}

	public function login()
	{
		$data = [
			'title' => 'Login'
		];

		$validation = [
			'username' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Username tidak boleh kosong'
				]
			],
			'password' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Password tidak boleh kosong'
				]
			]
		];
		if ($this->request->getMethod() == 'post') {
			# code...
			if (!$this->validate($validation)) {
				$data['validation'] = $this->validator;
				echo view('backend/login', $data);
			} else {
				return $this->login();
			}
		} else {
			echo view('backend/login', $data);
		}
	}

	public function register()
	{
		$data = [
			'title' => 'register'
		];

		$validation = [
			'username' => [
				'rules' => 'trim|required|is_unique[user.username]',
				'errors' => [
					'required' => 'Username tidak boleh kosong!',
					'is_unique' => 'Username telah terdaftar. Gunakan username lain!'
				]
			],
			'password' => [
				'rules' => 'trim|required|min_length[3]',
				'errors' => [
					'required' => 'password tidak boleh kosong!',
					'min_length' => 'minimal terdiri dari 3 karakter'
				]
			],
			'password1' => [
				'rules' => 'trim|required|matches[password]',
				'errors' => [
					'required' => 'Field ini tidak boleh kosong!',
					'matches' => 'Password tidak cocok!'
				]
			]
		];

		if ($this->request->getMethod() == 'post') {
			# cek validasi
			if (!$this->validate($validation)) { # JIKA VALIDASI AKTIF (ADA KESALAHAN INPUT), TAMPILKAN ERROR
				$data['validation'] = $this->validator;
				echo view('backend/register', $data);
			} else { #VALIDASI SUKSES AMBIL DATA INPUTAN

				# HASH PASSWORD
				$password = $this->request->getPost('password');
				$hashPassword = password_hash($password, PASSWORD_DEFAULT);
				# STORE DATA INPUTAN DALAM VARIABEL $dataUser
				$dataUser = [
					'username' => htmlspecialchars($this->request->getPost('username')),
					'password' => $hashPassword,
					'img' => 'profile.png'
				];

				# insert data to database
				$this->auth->addUser($dataUser);
				# buat flashdata dan direct ke halaman login
				$this->session->setFlashdata('registrasi', 'Registrasi berhasil');
				return redirect()->to('/login');
			}
		} else {
			echo view('backend/register', $data);
		}
	}

	//--------------------------------------------------------------------

}
