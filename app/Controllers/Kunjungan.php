<?php

namespace App\Controllers;

use App\Models\KunjunganModel;
use App\Models\PaketModel;
use App\Controllers\Pasien;

class Kunjungan extends BaseController
{
    public function __construct()
    {
        $this->model = new KunjunganModel();
        $this->cPasien = new Pasien();
        $this->paket = new PaketModel();
    }

    public function index($index = null)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $kunjungan = $this->getDataKunjungan($index);
        $no_rm = $this->db->query('SELECT `no_rm` FROM `status` WHERE `no_rm` != 0')->getResultArray();

        $data = [
            'title' => 'Kunjungan Pasien',
            'path' => 'Kunjungan',
            'kunjungan' => $kunjungan,
            'rm' => $no_rm
        ];
        echo view('backend/kunjungan', $data);
    }

    private function getDataKunjungan($index = null)
    {
        if ($index == 1) {
            $tglStart = $this->request->getVar('tgl-start');
            $tglEnd = $this->request->getVar('tgl-end');
            $kunjungan = $this->db->query('SELECT *,`kunjungan`.`id` as `id_kunjungan` from `kunjungan` 
            JOIN `pasien` on `pasien`.`id` = `kunjungan`.`id_pasien`
            JOIN `status`on `pasien`.`id_status` = `status`.`id` WHERE DATE(`kunjungan`.`tgl_kunjungan`) BETWEEN "' . $tglStart . '" AND "' . $tglEnd . '"')->getResultArray();
        } else {
            $kunjungan = $this->db->table('kunjungan')->select('*,kunjungan.id as id_kunjungan')
                ->join('pasien', 'pasien.id = kunjungan.id_pasien')
                ->join('status', 'pasien.id_status = status.id')
                ->get()->getResultArray();
        }
        return $kunjungan;
    }

    public function export($type = null)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $kunjungan = $this->db->table('kunjungan')->select('*,kunjungan.id as id_kunjungan')
            ->join('pasien', 'pasien.id = kunjungan.id_pasien')
            ->join('status', 'pasien.id_status = status.id')
            ->get()->getResultArray();
        $data = [
            'data' => $kunjungan
        ];
        if ($type == 1) {
            echo view('backend/excel/kunjungan', $data);
        } else {
            echo view('backend/print/kunjungan', $data);
        }
    }

    public function addKunjungan($id, $kunjungan, $tgl)
    {
        $data = [
            'id_pasien' => $id,
            'jns_kunjungan' => $kunjungan,
            'tgl_kunjungan' => $tgl,
        ];
        $this->model->save($data);
    }

    public function addKontrol()
    {
        $validation = [
            'no_rm' => [
                'rules' => 'required|is_not_unique[status.no_rm]',
                'errors' => [
                    'required' => 'Form nomor RM tidak boleh kosong!',
                    'is_not_unique' => 'No. RM tidak terdaftar, periksa kembali inputan Anda!'
                ]
            ]
        ];

        if (!$this->validate($validation)) {
            $kunjungan = $this->db->table('kunjungan')->select('*,kunjungan.id as id_kunjungan')
                ->join('pasien', 'pasien.id = kunjungan.id_pasien')
                ->join('status', 'pasien.id_status = status.id')
                ->get()->getResultArray();
            $data = [
                'title' => 'Kunjungan Pasien',
                'path' => 'Kunjungan',
                'kunjungan' => $kunjungan,
                'validatoin' => $this->validator
            ];
            $this->session->setFlashdata('error', $this->validator->getError('no_rm'));
            return redirect()->to('/kunjungan');
        } else {
            $no_rm = $this->request->getVar('no_rm');
            $pasien = $this->db->query('SELECT `status`.`no_rm` as `no_rm`,`pasien`.`id` as `id_pasien`, `pasien`.`nama` as `nama` FROM `pasien`
            JOIN `status` ON `status`.`id` = `pasien`.`id_status`
            WHERE `status`.`no_rm` = ' . $no_rm)->getRowArray();
            $data = [
                'nama' => $pasien['nama'],
                'id_pasien' => $pasien['id_pasien'],
                'no_rm' => $pasien['no_rm'],
                'jns_kunjungan' => 'Kontrol',
                'tgl_kunjungan' => date("Y-m-d")
            ];

            $this->model->save($data);
            $this->session->setFlashdata('success', 'Pasien Kontrol berhasil ditambahkan !');
            return redirect()->to('/kunjungan');
        }
    }

    public function viewAddPasienByAdmin()
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Tambah Pasien',
            'path' => 'Tambah Pasien',
            'paket' => $this->paket->findAll()
        ];

        echo view('backend/tambahPasien', $data);
    }
}
