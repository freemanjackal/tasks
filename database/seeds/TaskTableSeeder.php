<?php

use Illuminate\Database\Seeder;
use App\Task;
class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	for($i=0; $i < 10; $i++){
	        DB::table('tasks')->insert([
	            'name' => Str::random(10),
	            'priorities' => $i,
	        ]);
    	}
    }
        
    
           
}
