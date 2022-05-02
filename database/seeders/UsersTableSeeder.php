<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'Автор не известен',
                'email'     => 'author_unknown@g.g',
                'password'  => bcrypt(Str::random(16)),
            ],
            [
                'name'      => 'Автор',
                'email'     => 'author1@g.g',
                'password'  => bcrypt('123123123'),
            ]
        ];

        \DB::table('users')->insert($data);
    }
}