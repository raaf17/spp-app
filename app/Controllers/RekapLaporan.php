<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

class RekapLaporan extends ResourcePresenter
{
    public function index()
    {
        return view('rekaplaporan/index');
    }
}
