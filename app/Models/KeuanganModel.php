<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = "income";
    protected $useTimestamps = true;
    protected $allowedFields = ['income', 'total', 'sumber', 'ket'];
}
