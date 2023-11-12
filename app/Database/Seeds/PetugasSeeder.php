<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => password_hash('12345', PASSWORD_BCRYPT),
            'nama_petugas' => 'Kipli',
            'level' => 'admin'
        ];
        $this->db->table('petugas')->insert($data);
    }
}
