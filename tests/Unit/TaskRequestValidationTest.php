<?php

namespace Tests\Unit;

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TaskRequestValidationTest extends TestCase
{
    
     /**
     * @dataProvider data
     */
    public function test_task_request_validations($title,$is_done,$expects): void
    {
        $object = new TaskRequest;
        $data =[
            'title'=> $title,
            'is_done'=> $is_done
        ];
        $validator=Validator::make($data,$object->rules());
        $result=$validator->passes();
        $this->assertEquals($result,$expects);
    }
    public function data(){
        return [
            ['jhdsfgj','1',true],
            ['bfjhs','1',false],
            ['','',false]
        ];
    }
} 