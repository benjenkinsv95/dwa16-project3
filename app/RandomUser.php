<?php
/**
 * Created by IntelliJ IDEA.
 * User: ben
 * Date: 10/8/2016
 * Time: 7:55 PM
 */

namespace Project3;


class RandomUser
{
    private $fullName;
    private $userName;
    private $password;
    private $email;
    private $birthDate;
    private $streetAddress;
    private $phoneNumber;
    private $coverPictureURL;
    private $profilePictureURL;

    /**
     * RandomUser constructor.
     * @param $fullName
     * @param $userName
     * @param $password
     * @param $email
     * @param $birthDate
     * @param $streetAddress
     * @param $phoneNumber
     * @param $coverPictureURL
     * @param $profilePictureURL
     */
    public function __construct($fullName, $userName, $password, $email, $birthDate, $streetAddress, $phoneNumber, $coverPictureURL, $profilePictureURL)
    {
        $this->fullName = $fullName;
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->streetAddress = $streetAddress;
        $this->phoneNumber = $phoneNumber;
        $this->coverPictureURL = $coverPictureURL;
        $this->profilePictureURL = $profilePictureURL;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }




    /**
     * @return mixed
     */
    public function getCoverPictureURL()
    {
        return $this->coverPictureURL;
    }

    /**
     * @return mixed
     */
    public function getProfilePictureURL()
    {
        return $this->profilePictureURL;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }


}