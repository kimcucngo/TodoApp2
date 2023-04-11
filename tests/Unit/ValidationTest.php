<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Http\Requests\TaskRequest;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;

class ValidationTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_validation($title,$is_done,$expects): void
    {
        $object = new TaskRequest;
        $data =[
            'title'=> $title,
            'is_done'=> $is_done
        ];
        $validator=Validator::make($data,$object->rules());
        dd($validator->json());
        $result=$validator->passes();
        $this->assertEquals($result,$expects);
    }
    // public function data(){
    //     return [
    //         ['jhdsfgj','1',true],
    //         ['bfjhs','1',false],
    //         ['','',false]
    //     ];
    // }
} 