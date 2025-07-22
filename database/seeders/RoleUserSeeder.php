<?php


namespace Database\Seeders;

use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        RoleUser::create([
            'role_id' => 1,
            'user_id' => 1
        ]);
        RoleUser::create([
            'role_id' => 1,
            'user_id' => 2
        ]);
    }
}
