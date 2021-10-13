<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $adminPassword = '$2y$10$JcmAHe5eUZ2rS0jU1GWr/.xhwCnh2RU13qwjTPcqfmtZXjZxcryPO';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::connection('mysql')->table('admin_user')->insert(
            [
                ['id' => '1', 'username' =>'admin', 'password' => $this->adminPassword, 'email' => 'ianantashrestha@gmail.com', 'name' => 'Administrator', 'avatar' => '/admin/avatar/user.jpg', 'created_at' => date('Y-m-d H:i:s')],
            ]
        );
    }
}
