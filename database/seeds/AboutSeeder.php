<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['mission']="To provide the most actionable app store data";
        $data['about']="At Apptopia, we all come to work every day because we want to solve the biggest problem in
            mobile.Everyone is guessing. Publishers don’t know what apps to build, how to monetize them, or even
            what to price them at. Advertisers &amp; brands don’t know where their target users are, how to reach them,
            or even how much they need to spend in order to do so. Investors aren’t sure which apps and genres are
            growing the quickest, and where users are really spending their time (and money).
              Throughout the history of business, people use data to make more informed decisions.
            Our mission at Apptopia is to make the app economy more transparent. Today we provide the most actionable
            mobile app data &amp; insights in the industry. We want to make this data available to as many people as
            possible (not just the top 5%).";
        \App\Model\About::create($data);
    }
}
