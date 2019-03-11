<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class Employee extends Controller
{
    // Get all assigned task to employee
	public function allTask()
	{
		$restul_array = [];

		$result_task = DB::table("employees")->select(['employee','task_date','start_time','end_time','task_description'])->get();
		
		foreach($result_task as $get_data)
		{ 
			array_push($restul_array, array("employee"=>$get_data->employee,
											"date"=>date("D, M j, Y", strtotime($get_data->task_date)),
											"start_time"=>date("H:i", strtotime($get_data->start_time)),
											"end_time"=>date("H:i", strtotime($get_data->end_time)),
											"task_description"=>$get_data->task_description));
		}
		
		return response()->json($restul_array);
	}
	/////
	
	
	// Save task to employee table
	public function saveTask(Request $request)
	{
		// Set post value rules
		
		$rules = [
					'employee_name' => ['required', 'regex:^[A-Za-z0-9,-_ ]+$^'],
					'task_scheduled_on' => ['required', 'regex:^[A-Za-z0-9, ]+$^'],
					'start_time' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
					'end_time' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'],
					'description' => ['required']
		];
		
		$customMessages = [
							'required' => 'The :attribute field is required.'
		];
		
		$this->validate($request, $rules, $customMessages);
		
		/// Get all post values 
		
		$employee_name = $request->input("employee_name");   // Get Employee Name
		
		$task_date = $request->input("task_scheduled_on");   // Get assigned date for the task 
		
		$start = $request->input("start_time");              // Get start of the task 
		
		$end = $request->input("end_time");                  // Get end of the task 
		
		$task_description = $request->input("description");  // Get the task description      
		
		$start_time = date("Y-m-d H:i:s",strtotime($task_date." ".$start));
		$end_time = date("Y-m-d H:i:s",strtotime($task_date." ".$end));

		$diff__ = strtotime($task_date." ".$end) - strtotime($task_date." ".$start);
		
		if($diff__ > 0)
		{
			$results = DB::select(DB::raw("SELECT count(*) as emp_num FROM `employees` WHERE end_time > '$start_time' and employee = '$employee_name'"));
			
			if($results[0]->emp_num == 0)
			{
				$values = array('id' => 0,
								'employee' => $employee_name,
								'task_date' => date("Y-m-d",strtotime($task_date)),
								'start_time' => date("Y-m-d H:i:s",strtotime($task_date." ".$start)),
								'end_time' => date("Y-m-d H:i:s",strtotime($task_date." ".$end)),
								'task_description' => $task_description
								);
				
				DB::table('employees')->insert($values); 
				return $this->allTask();
			}
			
			else
			{
				return response()->json(array("response"=>0));
			}
		}
		
		else
		{
				return response()->json(array("response"=>2));
		}
	}
	/// End of employee task inserting 
}
