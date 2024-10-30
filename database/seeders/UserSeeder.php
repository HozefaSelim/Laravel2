<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(5)->create();
        
        // for ($i=0 ; $i< 10 ; $i++){
        //     User::create([
        //         'name' => "ahmed".$i,
        //         'email' => 'a'.$i.'@gmail.com',
        //         "password" => Hash::make('12345')
        //     ]);
        // }
       
    }
}
