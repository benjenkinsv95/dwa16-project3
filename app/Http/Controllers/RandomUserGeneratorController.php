<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;

use Project3\Http\Requests;
use Faker\Factory;
use Project3\Http\Requests\GenerateRandomUserRequest;
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
        return \View::make('random-user-generator.index')->with([
            'MIN_NUM_USERS' => GenerateRandomUserRequest::MIN_NUM_USERS,
            'MAX_NUM_USERS' => GenerateRandomUserRequest::MAX_NUM_USERS
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerateRandomUserRequest $request)
    {
        $data = $request->all();
        $users = $this->getUsers($data['number-of-users']);
        $request->flash();

        return \View::make('random-user-generator.index')->with([
            'users' => $users,
            'MIN_NUM_USERS' => GenerateRandomUserRequest::MIN_NUM_USERS,
            'MAX_NUM_USERS' => GenerateRandomUserRequest::MAX_NUM_USERS
        ]);
    }

    private function getUsers($numberOfUsers){
        $factory = Factory::create('en_US');
        $users = [];
        for($i = 1; $i <= $numberOfUsers; $i++){
            $user = $this->generateRandomUser($factory, $i, $numberOfUsers);
            array_push($users, $user);
        }

        return $users;
    }

    private function generateRandomUser($factory, $userNumber, $numberOfUsers){
        $fullName = $factory->name;
        $userName = $factory->userName;
        $password = $factory->password;
        $email = $userName . '@' . $factory->freeEmailDomain;
        $birthDate = $factory->dateTimeBetween('-30 years', '-18 years')->format('m/d/y');
        $streetAddress = $factory->streetAddress;
        $phoneNumber = $factory->phoneNumber;
        $coverPictureURL = 'http://placeimg.com/' . $this->getCoverPictureWidth() . '/' . $this->getCoverPictureHeight().'/nature';
        $profilePictureURL = 'http://placeimg.com/' . $this->getProfilePictureWidth() . '/' . $this->getProfilePictureHeight().'/people';

        return new RandomUser($fullName, $userName, $password, $email, $birthDate, $streetAddress, $phoneNumber, $coverPictureURL, $profilePictureURL);
    }

    /*
    |--------------------------------------------------------------------------
    | PlaceImg random pictures
    |--------------------------------------------------------------------------
    |
    | Profiles and cover pictures must have unique URLS to get unique images
    | returned.
    |
    */
    public function getCoverPictureHeight(){
        return 200;
    }

    public function getCoverPictureWidth(){
        return 350 + $this->getWidthOffset();
    }

    public function getProfilePictureHeight(){
        return 250;
    }

    public function getProfilePictureWidth(){
        return 250 + $this->getWidthOffset();
    }

    public function getWidthOffset(){
        return random_int(0, 14);
    }
}
