<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table("users")->insert(
        	[
	        	"name" => "Admin",
	        	"username" => "admin",
	        	"email" => "admin@example.com",
	        	"bio" => "I am an admin",
	        	"password" => password_hash("admin", PASSWORD_BCRYPT),
	        	"photo" => null,
	        	"created_at" => date("Y-m-d H:i:s")
        	]
        );
    }
}
