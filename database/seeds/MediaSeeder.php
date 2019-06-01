<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['facebook']='https://www.facebook.com/';
        $data['google']='https://www.gmail.com';
        $data['twitter']='https://www.twitter.com';
        $data['instagram']='https://www.instagram.com';
        \App\Model\Media::create($data);
    }
}
