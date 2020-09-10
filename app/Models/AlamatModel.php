<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatModel extends Model
{
    protected $table = "alamat";
    protected $useTimestamps = false;
    protected $allowedFields = ['alamat', 'rt', 'rw', 'kecamatan', 'kelurahan', 'kota_kab', 'kodepos'];
}
