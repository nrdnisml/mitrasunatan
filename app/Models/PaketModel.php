<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = "paket";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'deskripsi', 'harga_anak', 'harga_dewasa'];
}
