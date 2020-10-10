<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new user;
        $user->userid = '202008300001';
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->alamat = 'cikupa tangerang';
        $user->no_telp = '0895334359983';
        $user->no_hp = '0895334359983';
        $user->role = '1';
        $user->password = Hash::make("admin12345");
        $user->save();

    }
}
