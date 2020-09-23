<?php

namespace App\Controllers;

use App\Models\KeuanganModel;

class Keuangan extends BaseController
{
    public function __construct()
    {
        $this->model = new KeuanganModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Keuangan',
            'path' => 'Keuangan',
            'income' => $this->model->findAll()
        ];

        echo view('/backend/keuangan', $data);
    }

    public function add()
    {
        $income = $this->request->getVar('income');
        $data = [
            'income' => $income,
            'total' => $this->hitungTotal($income),
            'sumber' => $this->request->getVar('sumber'),
            'ket' => $this->request->getVar('ket')
        ];
        $this->model->save($data);

        return redirect()->to('/keuangan');
    }

    public function addByConfirm($income, $sumber, $ket)
    {
        $data = [
            'income' => $income,
            'total' => $this->hitungTotal($income),
            'sumber' => $sumber,
            'ket' => $ket,
        ];
        $this->model->save($data);
    }

    public function hitungTotal($input)
    {
        $income = $this->db->table('income')->selectSum('income')->get()->getRow();
        return $input + $income->income;
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/keuangan');
    }
}
