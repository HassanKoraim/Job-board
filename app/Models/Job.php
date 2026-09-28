<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job 
{
    public static function all()
    {
        return [
            ['title' => 'Software Engineer', 'Salary' => '1000'],
            ['title'=> 'Graphic Desginer', 'Salary' => '2000']
        ];
    }
}
