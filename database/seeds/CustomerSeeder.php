<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['email']='user@gmail.com';
        $data['password']=bcrypt('user002');
        \App\Model\Customer::create($data);
    }
}
