<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transacao;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@eduyes.com.br',
            'password' => '$2y$12$xjNA6e8bFjfXF79h.zLHhuxk73aH7c8VqVAOcvO59F/LYJbGD2Y7e',
        ]);
    }
}

// $2y$12$xjNA6e8bFjfXF79h.zLHhuxk73aH7c8VqVAOcvO59F/LYJbGD2Y7e