<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
	public function show()
    {
    	//$tasks = Task::all();
    	$tasks = DB::table('tasks')
                ->orderBy('priorities', 'asc')
                ->get();
        return view('welcome', ['tasks' => $tasks]);
    }

    public function save(Request $request)
    {	
    	$dataArray = $request->input('data');
    	for($i=1 ; $i<=count($dataArray); $i++) {
    		var_dump($dataArray[$i-1]);

    		$task = Task::where('name', $dataArray[$i-1])->first();
    		$task->priorities = $i;
    		$task->save();
    	}

    	return response('1', 200);

    }

}
