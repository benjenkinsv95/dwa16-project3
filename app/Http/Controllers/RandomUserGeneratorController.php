<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;

use Project3\Http\Requests;
use Faker\Factory;
use Project3\RandomUser;

class RandomUserGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory = Factory::create();
        $users = [];
        for($i = 0; $i < 5; $i++){
            $name = $factory->name;
            $email = $factory->email;
            $birthDate = $factory->dateTimeBetween('-30 years', 'now')->format('m/d/y');
            $streetAddress = $factory->streetAddress;
            $phoneNumber = $factory->phoneNumber;
            $coverPictureURL = 'http://placeimg.com/120' . $i . '/200/nature';
            $profilePictureURL = 'http://placeimg.com/25' . $i . '/250/people';

            $user = new RandomUser($name, $email, $birthDate, $streetAddress, $phoneNumber, $coverPictureURL, $profilePictureURL);
            array_push($users, $user);
        }
        return view('random_user_generator')->with(compact('users'));;
    }
}
