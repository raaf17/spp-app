<?php

namespace App\Controllers;

class Setting extends BaseController
{
    public function index(): string
    {
        return view('setting/index');
    }

    public function generate()
    {
        echo password_hash('12345', PASSWORD_BCRYPT);
    }
}
