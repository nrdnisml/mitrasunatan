<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganModel extends Model
{
    protected $table = "kunjungan";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_pasien', 'jns_kunjungan', 'tgl_kunjungan'];
}
