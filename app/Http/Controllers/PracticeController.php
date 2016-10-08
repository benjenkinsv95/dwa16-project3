<?php

namespace Project3\Http\Controllers;

use Project3\Http\Requests;
use Rych\Random\Random;
use Faker\Factory;

class PracticeController extends Controller
{
    public function example1()
    {
        $random = new Random();
        return $random->getRandomString(8);
    }

    public function example2()
    {
        $factory = Factory::create();
        return $factory->firstNameMale;
    }

    /**
     * Display an index of all available index methods
     * From: https://github.com/susanBuck/foobooks/blob/master/app/Http/Controllers/PracticeController.php
     */
    public function index()
    {
        # Get all the methods in this class
        $actionsMethods = get_class_methods($this);
        # Loop through all the methods
        foreach ($actionsMethods as $actionMethod) {
            # Only if the method includes the word "example"...
            if (strstr($actionMethod, 'example')) {
                # Display a link to that method's route
                echo '<a target="_blank" href="/practice/' . str_replace('example', '', $actionMethod) . '">' . $actionMethod . '</a>';
            }
        }
    }
}
