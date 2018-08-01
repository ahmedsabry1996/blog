<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $user = App\User::create([
            'name'=>'Ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>bcrypt('password'),
            "admin"=>1
        
        ]);
    
        App\Profile::create([
            
           'user_id'=>$user->id,
            'avatar'=>'uploads/ava/1.png',
           'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi at tenetur pariatur ',
            'facebook'=>'fb.com',
            'youtube'=>'iii.com'
        ]);
    }
}

?>