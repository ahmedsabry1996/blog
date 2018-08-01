<?php

use Illuminate\Database\Seeder;
use App\Setting as settings;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
    \App\Setting::create([
        
        'site_name'=>'ahmed sabry',
        'contact_num'=>123456789,
        'email'=>'ahmed@me.com',
        'address'=>'Egypt,Menofiz'
    ]);
        
    }
}
