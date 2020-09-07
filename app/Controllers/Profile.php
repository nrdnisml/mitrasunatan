<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\Image;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->model = new UserModel();
        $this->gambar = new Image();
    }
    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $this->id = $this->session->get('id');
        $data = [
            'title' => "Profile",
            'path' => "Profile",
            'user' => $this->model->where('id', $this->id)->first()
        ];
        echo view('/backend/profile', $data);
    }

    public function update()
    {
        // this lokal var
        $id = $this->session->get('id');
        $user = $this->model->where('id', $id)->find();

        // this var for parameter function on Image class
        $file = $this->request->getFile('gambar');
        $img =  $this->model->where('id', $id)->findColumn('img');

        $validation = [
            'username' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                ]
            ],
            'password' => [
                'rules' => 'trim',
            ],
            'password1' => [
                'rules' => 'trim|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak cocok!'
                ]
            ]
        ];

        if (!$this->validate($validation)) {
            $data = [
                'title' => "Profile",
                'path' => "Profile",
                'user' => $this->model->where('id', $id)->first(),
                'validation' => $this->validator
            ];
            echo view('backend/profile', $data);
        } else {
            if ($this->request->getVar('password') == "") {
                $data1 = [
                    'username' => $this->request->getVar('username'),
                    'img' => $this->gambar->uploadGambar($id, $file, $img)
                ];
                // hapus gambar dalam folder assets jika user upload gambar profile baru
                if ($file->getName() != "") {
                    if (file_exists(FCPATH . '/assets/img/profile/' . $user[0]['img'])) {
                        $this->gambar->hapusGambar($id, $img);
                    }
                }
                $this->model->update($id, $data1);
                $this->session->set($data1);
                $this->session->setFlashdata('success', 'Data berhasil diupdate!');
                return redirect()->to('/profile');
            } else {
                $password = $this->request->getVar('password');
                $password = password_hash($password, PASSWORD_DEFAULT);
                $data1 = [
                    'username' => $this->request->getVar('username'),
                    'password' => $password,
                    'img' => $this->gambar->uploadGambar($id, $file, $img)
                ];

                // hapus gambar dalam folder assets jika user upload gambar profile baru
                $file = $this->request->getFile('gambar');
                if ($file->getName() != "") {
                    if (file_exists(FCPATH . '/assets/img/profile/' . $user[0]['img'])) {
                        $this->gambar->hapusGambar($id, $img);
                    }
                }

                $this->model->update($id, $data1);
                $this->session->set($data1);
                $this->session->setFlashdata('success', 'Data berhasil diupdate!');
                return redirect()->to('/profile');
            }
        }
    }
}
