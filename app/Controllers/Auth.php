<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->auth = new UserModel();
    }

    public function login()
    {
        $validation = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]
        ];

        if ($this->request->getMethod() == "post") {
            if (!$this->validate($validation)) {
                $data = [
                    'validation' => $this->validator,
                    'title' => 'Login'
                ];
                echo view('backend/login', $data);
            } else {
                return $this->loginAuth();
            }
        } else {
            return redirect()->to('/login');
        }
    }

    private function loginAuth()
    {

        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));
        $user = $this->auth->where('username', $username)->first();

        if ($user) { // CEK APAKAH USERNAME YANG DIINPUT ADA
            if (password_verify($password, $user['password'])) { // JIKA ADA CEK PASSWORD APAKAH SUDAH BENAR
                $data = [ // JIKA AKTIF, BUAT SESSION DARI USER
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'img' => $user['img'],
                ];
                $this->session->set($data);
                return redirect()->to('/dashboard');
            } else { // JIKA PASSWORD SALAH TAMPILKAN PESAN ERROR, KEMBALIKAN KE HALAMAN LOGIN
                $this->session->setFlashdata('meesage', 'Password salah !');
                return redirect()->to('/login');
            }
        } else {
            $this->session->setFlashdata('meesage', 'Username tidak ditemukan !');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'register | YARUTHAB'
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
                $this->auth->save($dataUser);
                # buat flashdata dan direct ke halaman login
                $this->session->setFlashdata('registrasi', 'Registrasi berhasil, silahkan minta konfirmasi akun ke admin sebelum login!');
                return redirect()->to('/login');
            }
        } else {
            echo view('backend/register', $data);
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
