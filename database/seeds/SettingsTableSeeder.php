<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {

    /**
     * Run the Setting model database seed.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'slug'  => 'title',
                'value' => 'Stock'
            ],
            [
                'slug'  => 'description',
                'value' => 'Stock'
            ],
            [
                'slug'  => 'address',
                'value' => 'Nepal',
            ],
            [
                'slug'  => 'phone',
                'value' => '4444444444',
            ],
            [
                'slug'  => 'email',
                'value' => 'info@stock.com'
            ],
            [
                'slug'  => 'postbox',
                'value' => 'PO Box 14522222'
            ],
            [
                'slug'  => 'facebook',
                'value' => 'https://www.facebook.com'
            ],
            [
                'slug'  => 'twitter',
                'value' => 'https://www.twitter.com'
            ],
            [
                'slug'  => 'google_plus',
                'value' => 'https://www.google.com'
            ],
            [
                'slug'  => 'logo',
                'value' => '/img/logo.png'
            ],
            [
                'slug'  => 'notification-emails',
                'value' => 'admin@stock.com.np'
            ],
            [
                'slug'  => 'placeholder',
                'value' => '/img/parallax.jpg'
            ]
        ];

        DB::table('settings')->truncate();

        DB::table('settings')->insert($settings);
    }
}
