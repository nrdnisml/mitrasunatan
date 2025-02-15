<?php

namespace App\Controllers;

use App\Models\StatusModel;
use App\Models\PasienModel;
use App\Controllers\Kunjungan;
use App\Controllers\Pendaftar;
use App\Controllers\Keuangan;


class Dashboard extends BaseController
{
    public function __construct()
    {

        $this->cKunjungan = new Kunjungan();
        $this->cKeuangan = new Keuangan();
        $this->cPendaftar = new Pendaftar();
        $this->pasien = new PasienModel();
        $this->status = new StatusModel();
        $this->db = \Config\Database::connect();
        helper('global');
    }
    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $pendaftar =  $query = $this->db->query('SELECT 
        `pasien`.*,`pasien`.`id` as `id_pasien`, 
        `status`.*, 
        `paket`.`nama` as `paket`,
        `alamat`.*,`penanggung_jawab`.`nama` as `pj`,
        `penanggung_jawab`.`status` as `hubungan`,`penanggung_jawab`.`nama` as `nama_pj`
        FROM `pasien` 
        JOIN `status` on `pasien`.`id_status` = `status`.`id`
        JOIN `paket` ON `paket`.`id` = `pasien`.`id_paket`
        JOIN `alamat` ON `pasien`.`id_domisili` = `alamat`.`id`
        LEFT JOIN `penanggung_jawab` ON `pasien`.`id_pj` = `penanggung_jawab`.`id`
        WHERE `status`.`is_confirm` = 0 ORDER BY `id_pasien` DESC')->getResultArray();
        $keuangan = $this->db->query('SELECT SUM(income) AS income , CAST(created_at AS Date) as created_at
        FROM income GROUP by CAST(created_at AS Date)')->getResultArray();
        $data = [
            'title'     => 'Dashboard',
            'path'      => 'Dashboard',
            'n_pasien' => $this->db->table('pasien')->select('id')->countAllResults(),
            'n_kunjungan' => $this->db->table('kunjungan')->select('id')->countAllResults(),
            'pendaftar' => $pendaftar,
            'keuangan' => $keuangan
        ];
        return view('backend/dashboard', $data);
    }


    public function confirm($id)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        $pasien = $this->pasien->find($id);
        $paket = $this->cPendaftar->hargaPaketSunat($id);

        $data = [
            'id' => $pasien['id_status'],
            'is_confirm' => 1,
            'no_rm' => $this->setRm($id)
        ];
        $keuangan = [
            'income' => $paket['harga'],
            'sumber' => $pasien['nama'],
            'ket' => 'Sunat ' . $paket['nama']
        ];
        $this->cKeuangan->addByConfirm($keuangan['income'], $keuangan['sumber'], $keuangan['ket']);
        $this->status->save($data);
        $this->cKunjungan->addKunjungan($id, "Sunat", date("Y-m-d"));
        $this->session->setFlashdata('success', 'Konfirmasi berhasil !');
        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
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
        return redirect()->to('/dashboard');
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
