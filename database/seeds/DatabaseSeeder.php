<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([[
	            'id' => 0,
	            'employee' => 'Soumen Banerjee',
	            'task_date' => date('2019-01-26'),
				'start_time' => date('2019-01-26 08:26:30'),
				'end_time' => date('2019-01-26 10:02:10'),
				'task_description' => 'Project remodeling meeting.'
	    ],
		[
				'id' => 0,
	            'employee' => 'Mathew',
	            'task_date' => date('2019-01-20'),
				'start_time' => date('2019-01-20 13:12:28'),
				'end_time' => date('2019-01-20 14:12:10'),
				'task_description' => 'Meeting with client for project progress.'
		],
		[
				'id' => 0,
	            'employee' => 'Jeniffer',
	            'task_date' => date('2019-01-28'),
				'start_time' => date('2019-01-28 15:06:15'),
				'end_time' => date('2019-01-28 17:26:05'),
				'task_description' => 'Project planning.'
		]]);
    }
}
