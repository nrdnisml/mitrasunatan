<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $useTimestamps = false;
    protected $allowedFields = ['username', 'password', 'img'];
}
