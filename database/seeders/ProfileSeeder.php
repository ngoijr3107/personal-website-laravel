<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('profiles')->insert([
            'full_name'           => 'Fahim Anzam',
            'email'               => 'test@gmail.com',
            'phone'               => '+880**********',
            'location'            => 'city, country',
            'designation'         => 'Full Stack Web Developer',
            'profile_image'       => 'profile_low.png',
            'profile_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore possimus cum esse aut alias sint at ut earum, quod quam, tempora sed fuga illum? A! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore possimus cum esse aut alias sint at ut earum, quod quam, tempora sed fuga illum? A!',
            'cv_link'             => 'https://',
            'hire_link'           => 'https://',
            'facebook_link'       => 'https://',
            'github_link'         => 'https://',
            'linkedin_link'       => 'https://',
            'twitter_link'        => 'https://',
            'created_at'          => Carbon::now()
        ]);
    }
}
