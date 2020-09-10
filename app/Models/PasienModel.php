<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = "pasien";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_domisili', 'id_paket', 'id_status', 'id_pj', 'nama', 's_nikah', 'gol_dar', 'agama', 'tmp_lahir', 'tgl_lahir', 'pendidikan', 'no_tlp', 'email'];
}
