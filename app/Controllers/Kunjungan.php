<?php

namespace App\Controllers;

class Kunjungan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kunjungan Pasien',
            'path' => 'Kunjungan'
        ];
        echo view('backend/kunjungan', $data);
    }
}
