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

    public function index($day = null)
    {
        if ($day == 1) {
            $keuangan = $this->db->query('SELECT * FROM `income` WHERE DATE(`created_at`) = CURDATE()')->getResultArray();
        } elseif ($day == 7) {
            $keuangan = $this->db->query('SELECT * FROM `income` WHERE YEARWEEK(`created_at`) = YEARWEEK(NOW())')->getResultArray();
        } else {
            $keuangan = $this->model->findAll();
        }
        $data = [
            'title' => 'Keuangan',
            'path' => 'Keuangan',
            'income' => $keuangan
        ];

        echo view('/backend/keuangan', $data);
    }

    public function export($type = null)
    {
        $data = [
            'data' => $this->model->findAll()
        ];
        if ($type == 1) {
            echo view('/backend/excel/keuangan', $data);
        } else {
            echo view('/backend/print/keuangan', $data);
        }
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
