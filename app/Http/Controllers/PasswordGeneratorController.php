<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;
use Project3\Http\Requests;


class PasswordGeneratorController extends Controller
{
    const MIN_NUM_WORDS = 1;
    const MAX_NUM_WORDS = 9;
    const SYMBOLS = ['~', '!', '@', '#', '$', '%', '^', '&', '*', '?'];
    const DIGITS = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    private $error;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('password_generator', array('generatedPassword' => "", 'error' => $this->error));
    }

    /**
     * @return array random password based off of the form the user filled out.
     */
    private function generateRandomPassword()
    {
        # Store form data
        $numberOfWords = $_POST['number-of-words'];
        $numberIncluded = isset($_POST['number-included']);
        $specialSymbolIncluded = isset($_POST['special-symbol-included']);

        # Validate preconditions
        if (empty(trim($numberOfWords))) {
            $this->error = "Number of words expected a number but was empty.";
            return "";
        } else if (!is_numeric($numberOfWords)) {
            $this->error = "Number of words expected a number but found '$numberOfWords'.";
            return "";
        } else if ($numberOfWords < self::MIN_NUM_WORDS || $numberOfWords > self::MAX_NUM_WORDS) {
            $this->error = "Number of words should be between '" . self::MIN_NUM_WORDS . "' and '" . self::MAX_NUM_WORDS . "', but found '$numberOfWords'.";
            return "";
        }

        # Build password of combined random words
        $words = $this->getWords();
        $randomWords = $this->getRandomWords($words, $numberOfWords);
        $password = implode('-', $randomWords);

        # Tack in a number if the user wants one
        if ($numberIncluded) {
            $password = $this->getPasswordWithRandomNumber($password);
        }

        # Tack in a special symbol if the user wants one
        if ($specialSymbolIncluded) {
            $password = $this->getPasswordWithRandomSymbol($password);
        }

        return $password;
    }

    /**
     * @return array of words
     */
    private function getWords()
    {
        #   50 random words from: https://www.randomlists.com/random-words
        return explode(' ', 'part divide curve entertaining reject temporary interfere motion paper quill spell quack fetch' .
            ' royal bore cup exotic zesty daily branch underwear taste tight friction brick squeal rule wonderful absent ' .
            'stupid dark power prefer route rapid carve word muddled funny honey answer play mighty thoughtful crash' .
            ' early object equal damaging minister');
    }

    /**
     * @param $words array A list of words to choose from
     * @param $numberOfWords integer The number of words to return in an array
     * @return array An array of size $numberOfWords filled with randomly chosen words from $words
     */
    private function getRandomWords($words, $numberOfWords)
    {
        $randomWords = array();

        # Until we have an array with $numberOfWords random words
        while (count($randomWords) != $numberOfWords) {
            $randomWord = $this->getRandomKey($words);

            # Don't add duplicate words
            if (!in_array($randomWord, $randomWords, true)) {
                array_push($randomWords, $randomWord);
            }
        }

        return $randomWords;
    }

    /**
     * @param $array array An array of values
     * @return mixed A random value from the array
     */
    private
    function getRandomKey($array)
    {
        $randomIndex = mt_rand(0, count($array) - 1);
        $randomKey = $array[$randomIndex];
        return $randomKey;
    }

    /**
     * @param $password string The current password
     * @return string Insert a random number at a random spot inside of the $password
     */
    private function getPasswordWithRandomNumber($password)
    {
        $randomNumber = $this->getRandomKey(self::DIGITS);
        return $this->insertStringAtRandomIndex($password, $randomNumber);
    }


    /**
     * @param $password string The current password
     * @return string Insert a random special sybol at a random spot inside of the $password
     */
    private function getPasswordWithRandomSymbol($password)
    {
        $randomSymbol = $this->getRandomKey(self::SYMBOLS);
        return $this->insertStringAtRandomIndex($password, $randomSymbol);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generatedPassword = $this->generateRandomPassword();
        return view('password_generator', array('generatedPassword' => $generatedPassword, 'error' => $this->error));
    }

    /**
     * @param $aString
     * @param $aSubstring
     * @return mixed
     */
    private function insertStringAtRandomIndex($aString, $aSubstring)
    {
        $randomIndex = mt_rand(0, strlen($aString) - 1);
        $aString = substr_replace($aString, $aSubstring, $randomIndex, 0);
        return $aString;
    }
}
