<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __invoke()
    {
        $persons = [
            [
                'id' => 1,
                'name' => 'Vasya',
                'age' => 20,
                'job' => 'coach',
            ],
            [
                'id' => 2,
                'name' => 'Elena',
                'age' => 17,
                'job' => 'none',
            ],
            [
                'id' => 3,
                'name' => 'John',
                'age' => 30,
                'job' => 'driver',
            ],
        ];
        return $persons;
    }

}
