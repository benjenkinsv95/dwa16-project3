<?php

namespace Project3\Http\Controllers;

use Project3\Http\Requests;

class PracticeController extends Controller
{
    public function example1()
    {
        return '1';
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
