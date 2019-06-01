<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['toll']='17-100403';
        $data['phone']='012321323';
        $data['email']='dasdsa@gmail.com';
        $data['address']='Kathmandu,Nepal';
        $data['website']='www.dxnonline.com';
        \App\Model\Contact::create($data);
    }
}
