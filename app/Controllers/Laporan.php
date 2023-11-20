<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        return view('laporan/index');
    }
}
