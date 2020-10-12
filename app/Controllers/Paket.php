<?php

namespace App\Controllers;

use App\Models\PaketModel;

class Paket extends BaseController
{
    public function __construct()
    {
        $this->model = new PaketModel();
        helper('global');
    }

    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Paket',
            'path' => 'paket',
            'paket' => $this->model->findAll()
        ];

        echo view('backend/paket', $data);
    }

    public function getDataById($id)
    {
        echo json_encode($this->model->find($id));
    }

    public function jsonRupiah($id)
    {
        $data = $this->model->find($id);
        $paket = [
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi'],
            'harga_anak' => rupiah($data['harga_anak']),
            'harga_dewasa' => rupiah($data['harga_dewasa']),
        ];

        echo json_encode($paket);
    }

    public function add()
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => trim($this->request->getVar('deskripsi')),
            'harga_anak' => $this->request->getVar('harga_a'),
            'harga_dewasa' => $this->request->getVar('harga_d')
        ];

        $this->model->save($data);
        $this->session->setFlashdata('success', 'Data berhasil ditambahkan!');
        return redirect()->to('/paket/index');
    }

    public function update($id)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => trim($this->request->getVar('deskripsi')),
            'harga_anak' => $this->request->getVar('harga_a'),
            'harga_dewasa' => $this->request->getVar('harga_d')
        ];

        $this->model->save($data);
        $this->session->setFlashdata('success', 'Data berhasil diupdate!');
        return redirect()->to('/paket/index');
    }

    public function delete($id)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $this->model->delete($id);
        $this->session->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('/paket/index');
    }
}
