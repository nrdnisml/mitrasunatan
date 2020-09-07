<?php

namespace App\Controllers;

use App\Models\InstansiModel;
use App\Controllers\Image;

class Instansi extends BaseController
{

    private $validation = [
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Instansi harus diisi !']
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ],
        'no_tlp' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Nomor telepon harus diisi',
                'numeric' => 'Isi form dengan nomor yang valid'
            ]
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi'
            ]
        ],
        'kelurahan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kelurahan harus diisi'
            ]
        ],
        'kecamatan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kecamatan harus diisi'
            ]
        ],
        'kota' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kota / Kabupaten harus diisi'
            ]
        ]
    ];

    public function __construct()
    {
        $this->model = new InstansiModel();
        $this->image = new Image();
        $this->instansi =  $this->model->findAll();
    }


    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => "Data Instansi",
            'path' => "Data Instansi"
        ];
        if ($this->instansi) {
            $data['instansi'] = $this->instansi[0];
            echo view('/backend/instansi/instansi', $data);
        } else {
            echo view('/backend/instansi/tambahInstansi', $data);
        }
    }

    public function tambah()
    {
        // this var for parameter function on Image class
        $file = $this->request->getFile('gambar');

        if (!$this->validate($this->validation)) {
            $instansi =  $this->model->findAll();
            $data = [
                'title' => "Data Instansi",
                'path' => "Data Instansi",
                'validation' => $this->validator
            ];
            return view('backend/instansi/tambahInstansi', $data);
        } else {
            $kota = $this->request->getVar('pilih') . " " . $this->request->getVar('kota');
            $img = $this->request->getVar('img');

            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_tlp' => $this->request->getVar('no_tlp'),
                'alamat' => $this->request->getVar('alamat'),
                'kota' => $kota,
                'kecamatan' => $this->request->getVar('kecamatan'),
                'kelurahan' => $this->request->getVar('kelurahan'),
                'img' => $this->image->addGambar($file)
            ];
            $this->model->save($data);
            $this->session->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to('/instansi');
        }
    }

    public function update()
    {
        $id = $this->model->findColumn('id');
        $file = $this->request->getFile('gambar');
        $img =  $this->model->where('id', $id[0])->findColumn('img');
        if (!$this->validate($this->validation)) {
            $data = [
                'title' => "Data Instansi",
                'path' => "Data Instansi",
                'instansi' => $this->instansi[0],
                'validation' => $this->validator
            ];
            return view('backend/instansi/instansi', $data);
        } else {
            $data = [
                'id' => $id[0],
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_tlp' => $this->request->getVar('no_tlp'),
                'alamat' => $this->request->getVar('alamat'),
                'kota' => $this->request->getVar('kota'),
                'kecamatan' => $this->request->getVar('kecamatan'),
                'kelurahan' => $this->request->getVar('kelurahan'),
                'img' => $this->image->uploadGambar($id, $file, $img)
            ];

            if ($file->getName() != "") {
                if (file_exists(FCPATH . '/assets/img/profile/' .  $img[0])) {
                    $this->image->hapusGambar($id, $img);
                }
            }
            $this->model->save($data);
            $this->session->setFlashdata('success', 'Data berhasil diupdate!');
            return redirect()->to('/instansi');
        }
    }
}
