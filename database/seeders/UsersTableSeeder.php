<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
        [    'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'is_admin' =>1,
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ],
    [
        'name' => 'User',
        'email' => 'user@example.com',
        'email_verified_at' => now(),
        'is_admin' => 0,
        'password' => Hash::make('secret'),
    ],
    ];

    foreach ($usersData as $key => $val) {
        User::create($val);
    }
    }
}
