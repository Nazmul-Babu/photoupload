<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Admin::create([
        'name'=>'admin',
        'password'=>bcrypt('111111')
      ]);
      echo 'main admin created\r\n';
      for($i=0 ; $i<5; $i++){
       $admin= Admin::create([
            'name'=>'admin'.rand(100,999),
            'password'=>bcrypt('111111')
          ]);
      echo $admin->name.' created\r\n';

      }
    }
}
