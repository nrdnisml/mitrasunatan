<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiModel extends Model
{
    protected $table = "instansi";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'no_tlp', 'img', 'email', 'kota', 'kecamatan', 'kelurahan', 'alamat'];
}
