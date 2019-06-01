<?php

use Illuminate\Database\Seeder;

class Faqseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['title']="How to add product in a cart?";
        $data['description']="Lorem ipsum dolor sit amet, consectetur adipisicing eli";
        \App\Model\Faq::create($data);
    }
}
