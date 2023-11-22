<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'kipli',
            'email' => 'kipli@gmail.com',
            'password' => password_hash('kipli123', PASSWORD_BCRYPT),
            'nama_petugas' => 'Kipli',
            'level' => 'admin'
        ];
        $this->db->table('users')->insert($data);
    }
}
