<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = "status";
    protected $useTimestamps = false;
    protected $allowedFields = ['tgl_booking', 'layanan', 'no_rm', 'n_kontrol', 'is_done', 'is_confirm'];
}
