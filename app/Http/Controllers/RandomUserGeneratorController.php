<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
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
        $formData = $request->all();
        $users = $this->getUsers($formData);
        $request->flash();

        return \View::make('random-user-generator.index')->with([
            'users' => $users,
            'MIN_NUM_USERS' => GenerateRandomUserRequest::MIN_NUM_USERS,
            'MAX_NUM_USERS' => GenerateRandomUserRequest::MAX_NUM_USERS
        ]);
    }

    private function getUsers($formData){
        $factory = Factory::create('en_US');
        $users = [];

        $numberOfUsers = $formData['number-of-users'];
        for($i = 1; $i <= $numberOfUsers; $i++){
            $user = $this->generateRandomUser($factory,  $formData);
            array_push($users, $user);
        }

        return $users;
    }

    /**
     * @param $factory
     * @param $formData
     * @return RandomUser
     */
    private function generateRandomUser($factory, $formData){
        $fullName = $factory->name;
        $userName = isset($formData['username-included']) ?  $factory->userName  : "";
        $password = isset($formData['password-included']) ?  $factory->password : "";
        $email = isset($formData['email-included']) ?  $userName . '@' . $factory->freeEmailDomain : "";
        $birthDate = isset($formData['birthday-included']) ?  $factory->dateTimeBetween('-30 years', '-18 years')->format('m/d/y') : "";
        $streetAddress = isset($formData['address-included']) ?  $factory->streetAddress : "";
        $phoneNumber = isset($formData['phone-number-included']) ?  $factory->phoneNumber : "";
        $coverPictureURL = isset($formData['pictures-included']) ?  'http://placeimg.com/' . $this->getCoverPictureWidth() . '/' . $this->getCoverPictureHeight().'/nature' : "";
        $profilePictureURL = isset($formData['pictures-included']) ?  'http://placeimg.com/' . $this->getProfilePictureWidth() . '/' . $this->getProfilePictureHeight().'/people' : "";

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
        return 160;
    }

    public function getCoverPictureWidth(){
        return 350 + $this->getWidthOffset();
    }

    public function getProfilePictureHeight(){
        return 160;
    }

    public function getProfilePictureWidth(){
        return 160 + $this->getWidthOffset();
    }

    public function getWidthOffset(){
        return random_int(0, 14);
    }
}
