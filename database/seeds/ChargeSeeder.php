<?php

use Illuminate\Database\Seeder;

class ChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['tax']="13";
        $data['shipping_cost']="150";
        \App\Model\Extra::create($data);
    }
}
