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
            'full_name'           => 'Paschal Mizengo',
            'email'               => 'pmizengo@gmail.com',
            'phone'               => '+255 786 397 123',
            'location'            => 'Dar es Salaam, Tanzania',
            'designation'         => 'Full Stack Developer',
            'profile_image'       => 'profile_low.png',
            'profile_description' => 'My objective is to make use of knowledge, talent and experience of business information communication Technology field to serve the community so as to bring about sustainable development as well as to build career in a growing organization, where i can get opportunity to prove my abilities by accepting challenges, fulfilling the organizational goal and climb the career ladder through continuous learning and commitment.',
            'cv_link'             => 'https://',
            'hire_link'           => 'https://',
            'facebook_link'       => 'https://',
            'github_link'         => 'https://github.com/ngoijr3107',
            'linkedin_link'       => 'https://www.linkedin.com/in/paschal-mizengo-3b19a585/',
            'twitter_link'        => 'https://twitter.com/paschalngoi',
            'created_at'          => Carbon::now()
        ]);
    }
}
