<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->nom = "ILBOUDO";
        $user1->email = "marcel@gmail.com";
        $user1->numero = '04040404';
        $user1->role = 2;
        $user1->password = Hash::make(('123456'));
        $user1->save();

        $user2 = new User();
        $user2->nom = "YODA";
        $user2->email = "nico@gmail.com";
        $user2->numero = '05050505';
        $user2->role = 1;
        $user2->password = Hash::make(('123456'));
        $user2->save();
    }
}
