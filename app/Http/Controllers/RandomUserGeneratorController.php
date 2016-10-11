<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;

use Project3\Http\Requests;
use Faker\Factory;
use Project3\RandomUser;

class RandomUserGeneratorController extends Controller
{
    private $error;
    private $numberOfUsers = 3;
    const MIN_NUM_USERS = 1;
    const MAX_NUM_USERS = 30;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('random_user_generator')->with([
            'MIN_NUM_USERS' => self::MIN_NUM_USERS,
            'MAX_NUM_USERS' => self::MAX_NUM_USERS,
            'numberOfUsers' => $this->numberOfUsers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->numberOfUsers = $this->getNumberOfUsers();
        $users = $this->getUsers($this->numberOfUsers);

        return \View::make('random_user_generator')->with([
            'users' => $users,
            'error' => $this->error,
            'MIN_NUM_USERS' => self::MIN_NUM_USERS,
            'MAX_NUM_USERS' => self::MAX_NUM_USERS,
            'numberOfUsers' => $this->numberOfUsers
        ]);
    }

    private function getNumberOfUsers(){
        # Store form data
        $numberOfUsers = $_POST['number-of-users'];

        # Validate preconditions
        if (empty(trim($numberOfUsers))) {
            $this->error = "Number of users expected a number but was empty.";
            return 0;
        } else if (!is_numeric($numberOfUsers)) {
            $this->error = "Number of users expected a number but found '$numberOfUsers'.";
            return 0;
        } else if ($numberOfUsers < self::MIN_NUM_USERS || $numberOfUsers > self::MAX_NUM_USERS) {
            $this->error = "Number of users should be between '" . self::MIN_NUM_USERS . "' and '" . self::MAX_NUM_USERS . "', but found '$numberOfUsers'.";
            return 0;
        }

        return $numberOfUsers;
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
        $coverPictureURL = 'http://placeimg.com/' . $this->getCoverPictureWidth($userNumber, $numberOfUsers) . '/' . $this->getCoverPictureHeight($userNumber, $numberOfUsers).'/nature';
        $profilePictureURL = 'http://placeimg.com/' . $this->getProfilePictureWidth($userNumber, $numberOfUsers) . '/' . $this->getProfilePictureHeight($userNumber, $numberOfUsers).'/people';

        return new RandomUser($fullName, $userName, $password, $email, $birthDate, $streetAddress, $phoneNumber, $coverPictureURL, $profilePictureURL);
    }

    /*
     * Profiles and cover pictures must have unique URLS to get unique images returned.
     */

    public function getCoverPictureHeight($userNumber, $numberOfUsers){
        return 200 + $this->getHeightOffset($userNumber, $numberOfUsers);
    }

    public function getCoverPictureWidth($userNumber, $numberOfUsers){
        return 350 + $this->getWidthOffset($userNumber, $numberOfUsers);
    }

    public function getProfilePictureHeight($userNumber, $numberOfUsers){
        return 250 + $this->getHeightOffset($userNumber, $numberOfUsers);
    }

    public function getProfilePictureWidth($userNumber, $numberOfUsers){
        return 250 + $this->getWidthOffset($userNumber, $numberOfUsers);
    }

    public function getNumberOfColumns($numberOfUsers){
        return floor(sqrt($numberOfUsers));
    }


    public function getWidthOffset($userNumber, $numberOfUsers){
        return (int) ($userNumber / $this->getNumberOfColumns($numberOfUsers));
    }

    public function getHeightOffset($userNumber, $numberOfUsers){
        return (int) ($userNumber % $this->getNumberOfColumns($numberOfUsers));
    }
}
