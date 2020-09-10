<?php

namespace App\Controllers;

use App\Models\StatusModel;

class Pendaftar extends BaseController
{
    public function index()
    {
        $query = $this->db->query('SELECT `pasien`.*, `status`.*, `paket`.`nama` as `paket`,
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
            'is_confirm' => 1
        ];
        $status->save($data);
        $this->session->setFlashdata('success', 'Konfirmasi berhasil !');
        return redirect()->to('/pendaftar');
    }
}
