<?php

namespace App\Models;

use CodeIgniter\Model;

class PjModel extends Model
{
    protected $table = "penanggung_jawab";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'id_domisili', 'status'];
}
