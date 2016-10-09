<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;

use Project3\Http\Requests;

class RandomUserGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('random_user_generator');
    }
}
