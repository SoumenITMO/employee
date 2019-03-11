<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
    /**
     * Test to check if we are getting the json employee task lists.
     *
     * @return json
     */
    public function testExample()
    {
        $response = $this->json('GET','/api/all_task');
        $response->assertStatus(200);
    }
	
	/**
     * Test to check saving data to db actually have correct protection to store valid data.
     *
     * @return json
     */
    public function testSavetask()
    {
		$data = ['employee_name' => "Unit test 22",
				'task_scheduled_on' => date("Y-m-d",strtotime("2019-03-10")),
				'start_time' => date("H:i", strtotime("13:00")),
				'end_time' => date("H:i", strtotime("13:40")),
				'description' => "Test task"
        ];
		
        $response = $this->json('POST', '/api/save_task', $data);
        $response->assertStatus(200);
    }	
}
