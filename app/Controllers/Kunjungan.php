<?php

namespace App\Controllers;

use App\Models\KunjunganModel;

class Kunjungan extends BaseController
{
    public function __construct()
    {
        $this->model = new KunjunganModel();
    }
    public function index()
    {
        $kunjungan = $this->db->table('kunjungan')->select('*,kunjungan.id as id_kunjungan')
            ->join('pasien', 'pasien.id = kunjungan.id_pasien')
            ->join('status', 'pasien.id_status = status.id')
            ->get()->getResultArray();
        $data = [
            'title' => 'Kunjungan Pasien',
            'path' => 'Kunjungan',
            'kunjungan' => $kunjungan
        ];
        echo view('backend/kunjungan', $data);
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
}
