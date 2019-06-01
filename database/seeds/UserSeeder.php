<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['roles']='admin';
        $data['email']='admin@gmail.com';
        $data['password']=bcrypt('admin002');
        $data['name']='admin';
        $data['phone']='01421755';
        \App\Model\User::create($data);
    }
}
