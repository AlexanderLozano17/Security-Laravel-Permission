<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario con el rol editor
        $editor = User::create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $editor->assignRole('editor');

        //Usuario con el rol moderador
        $editor = User::create([
            'name' => 'moderator',
            'email' => 'moderador@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $editor->assignRole('moderator');

        //Usuario con el rol super-admin
        $editor = User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $editor->assignRole('super-admin');

    }
}
