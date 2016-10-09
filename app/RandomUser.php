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
    private $name;
    private $email;
    private $birthDate;
    private $streetAddress;
    private $phoneNumber;
    private $coverPictureURL;
    private $profilePictureURL;

    /**
     * RandomUser constructor.
     * @param $name
     * @param $email
     * @param $birthDate
     * @param $streetAddress
     * @param $phoneNumber
     * @param $coverPictureURL
     * @param $profilePictureURL
     */
    public function __construct($name, $email, $birthDate, $streetAddress, $phoneNumber, $coverPictureURL, $profilePictureURL)
    {
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
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