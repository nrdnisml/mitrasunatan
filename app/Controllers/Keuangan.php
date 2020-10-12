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

    public function index($index = null)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }

        if ($index) {
            $tglStart = $this->request->getVar('tgl-start');
            $tglEnd = $this->request->getVar('tgl-end');
            $keuangan = $this->db->query('SELECT * FROM `income` WHERE DATE(`income`.`created_at`) BETWEEN "' . $tglStart . '" AND "' . $tglEnd . '"')->getResultArray();
            $totalIncome = $this->db->query('SELECT SUM(income) AS income FROM `income` WHERE DATE(`income`.`created_at`) BETWEEN "' . $tglStart . '" AND "' . $tglEnd . '"')->getRowArray();
        } else {
            $keuangan = $this->model->findAll();
            $totalIncome = $this->db->query('SELECT SUM(income) AS income FROM `income`')->getRowArray();
        }
        $data = [
            'title' => 'Keuangan',
            'path' => 'Keuangan',
            'income' => $keuangan,
            'totalIncome' => $totalIncome['income']
        ];

        echo view('/backend/keuangan', $data);
    }

    public function export($type = null)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
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
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $this->model->delete($id);
        return redirect()->to('/keuangan');
    }
}
