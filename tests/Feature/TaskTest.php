<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     *test application
     */
    public function test_application_response(): void
    {
        $tasks = Task::factory()->count(10)->create();

        $response = $this->getJson('api/tasks');
        // dd($response->assertStatus(200));

        $response
                ->assertStatus(200)
                ->assertJsonCount($tasks->count());
    }
    public function test_register(): void
    {
        $data = [
            'title'=>'test_schange'
        ];
        $response = $this->postJson('api/tasks',$data);
    
        $response
                ->assertCreated()
                ->assertJsonFragment($data);
    }
    public function test_update(): void
    {
        $task = Task::factory()->create();
        $task->title='fvsdrfg';

        $response = $this->patchJson('api/tasks/'.$task->id,$task->toArray());
    
        $response
                ->assertStatus(200);
    }
    public function test_destroy(): void
    {
        $task = Task::factory()->create();
      
        $response = $this->deleteJson('api/tasks/'.$task->id);
     
        $response
                ->assertStatus(200);
    }
    public function test_validation(): void
    {
        $data = [
            'title'=>'dfserg',
            'is_done'=>'0'
        ];
        $response = $this->postJson('api/tasks',$data);
        dd($response->json());
    
        $response
                ->assertCreated()
                ->assertJsonFragment($data);
    }
}