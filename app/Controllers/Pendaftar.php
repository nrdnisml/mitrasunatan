<?php

namespace App\Controllers;

use App\Models\StatusModel;
use App\Controllers\Kunjungan;

class Pendaftar extends BaseController
{
    public function __construct()
    {
        $this->cKunjungan = new Kunjungan();
        $this->status = new StatusModel();
        $this->db = \Config\Database::connect();
        helper('global');
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftar',
            'path' => 'pendaftar',
            'pendaftar' => $this->getData()
        ];
        echo view('backend/pendaftar', $data);
    }

    public function getData($id = null)
    {
        if (!$id) {
            $query = $this->db->query('SELECT 
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
        WHERE `status`.`is_confirm` = 0')->getResultArray();
            return $query;
        } else {
            $query = $this->db->query('SELECT 
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
        WHERE `status`.`is_confirm` = 0 AND	`pasien`.`id` = ' . $id)->getResultArray();
            return $query[0];
        }
    }

    public function getAlamatByKodePos($kodepos)
    {
        if ($kodepos) {
            $query = $this->db->query('SELECT * FROM `tbl_kodepos` WHERE `kodepos` = ' . $kodepos)->getResultArray();
            return $query;
        } else {
            return null;
        }
    }

    public function jsonAlamatByKodePos($kodepos)
    {
        echo json_encode($this->getAlamatByKodePos($kodepos));
    }

    public function jsonData($id)
    {
        $data = $this->getData($id);
        $tgl_booking = substr($data['tgl_booking'], 0, 10);
        $tgl_daftar = substr($data['created_at'], 0, 10);
        $tgl_lahir = substr($data['tgl_lahir'], 0, 10);
        $tgl_booking_indo = mediumdate_indo($tgl_booking);
        $tgl_daftar_indo = mediumdate_indo($tgl_daftar);

        $json = [
            'tgl_booking' => $tgl_booking_indo,
            'booking' => $tgl_booking,
            'tgl_daftar' => $tgl_daftar_indo,
            'nama' => $data['nama'],
            'agama' => $data['agama'],
            'layanan' => "Sunat di " . $data['layanan'],
            'paket' => $data['paket'],
            'nama_pj' => $data['nama_pj'],
            'hubungan' => $data['hubungan'],
            'alamat' => $data['alamat'] . " RT " . $data['rt'] . " RW " . $data['rw'] . " Kel. " . $data['kelurahan'] . " Kec. " . $data['kecamatan'] . " " . $data['kota_kab'],
            'wa' => $data['no_tlp'],
            'email' => $data['email'],
            'umur' => hitung_umur($tgl_lahir, $tgl_daftar),
        ];
        echo json_encode($json);
    }

    public function confirmProcess($id)
    {
        $pasien = $this->db->table('pasien')->getWhere(['id' => $id])->getRowArray();
        $data = [
            'id' => $pasien['id_status'],
            'is_confirm' => 1,
            'no_rm' => $this->setRm($id)
        ];
        $this->status->save($data);
        $this->cKunjungan->addKunjungan($id, "Sunat", date("Y-m-d"));
    }

    public function confirm($id)
    {
        $this->confirmProcess($id);
        $this->session->setFlashdata('success', 'Konfirmasi berhasil !');
        return redirect()->to('/pendaftar');
    }

    public function delete($id)
    {
        $data = $this->db->table('pasien')->getWhere(['id' => $id])->getRowArray();
        $id_pj = $data['id_pj'];
        $id_status = $data['id_status'];
        $id_domisili = $data['id_domisili'];

        $this->db->table('pasien')->delete(['id' => $id]);
        $this->db->table('penanggung_jawab')->where('id', $id_pj)->delete();
        $this->db->table('status')->where('id', $id_status)->delete();
        $this->db->table('alamat')->where('id', $id_domisili)->delete();

        $this->session->setFlashdata('success', 'Pendaftar berhasil di hapus !');
        return redirect()->to('/pendaftar');
    }

    public function setRm($id)
    {
        $nomor = "0000";
        $data = $this->db->table('pasien')->getWhere(['id' => $id])->getRowArray();
        $thn_daftar = substr($data['created_at'], 2, 2);
        $thn_lahir = substr($data['tgl_lahir'], 2, 2);
        $no_rm = $thn_daftar . $thn_lahir . substr($nomor, strlen($id), 4) . $id;
        return $no_rm;
    }

    public function editBooking($id)
    {
        $pasien = $this->db->table('pasien')->getWhere(['id' => $id])->getRowArray();
        $idStatus = $this->status->where('id', $pasien['id_status'])->findColumn('id');
        $data = [
            'id' => $idStatus[0],
            'tgl_booking' => $this->request->getVar('tgl-booking')
        ];
        $this->session->setFlashdata('success', 'Tanggal Booking berhasil diupdate !');
        $this->status->save($data);
        return redirect()->to('/pendaftar');
    }
}
