<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'path'      => 'Dashboard'
        ];
        return view('backend/dashboard', $data);
    }
}
