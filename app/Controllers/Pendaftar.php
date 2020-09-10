<?php

namespace App\Controllers;

use App\Models\StatusModel;
use App\Models\PasienModel;

class Pendaftar extends BaseController
{
    public function __construct()
    {
        $this->pasien = new PasienModel();
    }
    public function index()
    {
        $query = $this->db->query('SELECT `pasien`.*,`pasien`.`id` as `id_pasien`, `status`.*, `paket`.`nama` as `paket`,
        `alamat`.*,`penanggung_jawab`.`nama` as `pj`,
        `penanggung_jawab`.`status` as `hubungan`
        FROM `pasien` 
        JOIN  `status` on `pasien`.`id_status` = `status`.`id`
        JOIN `paket` ON `paket`.`id` = `pasien`.`id_paket`
        JOIN `alamat` ON `pasien`.`id_domisili` = `alamat`.`id`
        JOIN `penanggung_jawab` ON 	`pasien`.`id_pj` = `penanggung_jawab`.`id`
        WHERE `status`.`is_confirm` = 0')->getResultArray();
        $data = [
            'title' => 'Pendaftar',
            'path' => 'pendaftar',
            'pendaftar' => $query
        ];
        echo view('backend/pendaftar', $data);
    }

    public function confirm($id)
    {
        $status = new StatusModel();
        $data = [
            'id' => $id,
            'is_confirm' => 1,
            'no_rm' => $this->setRm($id)
        ];
        $status->save($data);
        $this->session->setFlashdata('success', 'Konfirmasi berhasil !');
        return redirect()->to('/pendaftar');
    }

    public function delete($id)
    {
        $data = $this->pasien->find($id);
        $id_pj = $data['id_pj'];
        $id_status = $data['id_status'];
        $id_domisili = $data['id_domisili'];

        $this->pasien->delete($id);
        $this->pasien->delete($id);
        $this->db->table('penanggung_jawab')->where('id', $id_pj)->delete();
        $this->db->table('status')->where('id', $id_status)->delete();
        $this->db->table('alamat')->where('id', $id_domisili)->delete();

        $this->session->setFlashdata('success', 'Pendaftar berhasil di hapus !');
        return redirect()->to('/pendaftar');
    }

    public function setRm($id)
    {
        $nomor = "0000";
        $data = $this->pasien->find($id);
        $thn_daftar = substr($data['created_at'], 2, 2);
        $thn_lahir = substr($data['tgl_lahir'], 2, 2);
        $no_rm = $thn_daftar . $thn_lahir . substr($nomor, strlen($id), 4) . $id;
        return $no_rm;
    }
}
