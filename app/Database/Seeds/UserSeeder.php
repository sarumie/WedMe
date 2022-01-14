<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Cara 1 : Satu data
        // $data = [
        //     'name_user' => 'Heiakim Kusumo',
        //     'email_user' => 'anjaygurinjay1@gmail.com',
        //     'password_user' => password_hash('12345', PASSWORD_BCRYPT)
        // ];

        // Cara 2 : Multi data
        $data = [
            'name_user' => 'Sultan Jaya',
            'email_user' => 'anjaygurinjay2@gmail.com',
            'password_user' => password_hash('12345', PASSWORD_BCRYPT)
        ];
        $this->db->table('users')->insert($data);
    }
}
