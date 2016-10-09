<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;
use Project3\Http\Requests;
use Faker\Factory;

class LoremIpsumGeneratorController extends Controller
{
    const MIN_NUM_PARAGRAPHS = 1;
    const MAX_NUM_PARAGRAPHS = 99;
    private $numberOfParagraphs = 3;
    const MIN_NUM_SENTENCES = 1;
    const MAX_NUM_SENTENCES = 10;
    private $numberOfSentences = 3;

    private $error;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('lorem_ipsum_generator')->with([
            'MIN_NUM_PARAGRAPHS' => self::MIN_NUM_PARAGRAPHS,
            'MAX_NUM_PARAGRAPHS' => self::MAX_NUM_PARAGRAPHS,
            'numberOfParagraphs' => $this->numberOfParagraphs,
            'MIN_NUM_SENTENCES' => self::MIN_NUM_SENTENCES,
            'MAX_NUM_SENTENCES' => self::MAX_NUM_SENTENCES,
            'numberOfSentences' => $this->numberOfSentences
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
        $this->numberOfParagraphs = $this->getNumberOf('paragraph', Self::MIN_NUM_PARAGRAPHS, Self::MAX_NUM_PARAGRAPHS);
        $this->numberOfSentences = $this->getNumberOf('sentence', Self::MIN_NUM_SENTENCES, Self::MAX_NUM_SENTENCES);
        $paragraphs = $this->getParagraphs($this->numberOfParagraphs, $this->numberOfSentences);

        return \View::make('lorem_ipsum_generator')->with([
            'MIN_NUM_PARAGRAPHS' => self::MIN_NUM_PARAGRAPHS,
            'MAX_NUM_PARAGRAPHS' => self::MAX_NUM_PARAGRAPHS,
            'numberOfParagraphs' => $this->numberOfParagraphs,
            'MIN_NUM_SENTENCES' => self::MIN_NUM_SENTENCES,
            'MAX_NUM_SENTENCES' => self::MAX_NUM_SENTENCES,
            'numberOfSentences' => $this->numberOfSentences,
            'paragraphs' => $paragraphs
        ]);
    }

    private function getNumberOf($items, $min, $max){
        # Store form data
        $numberOfItems = $_POST['number-of-' . $items .'s'];

        # Validate preconditions
        if (empty(trim($numberOfItems))) {
            $this->error = "Number of ' . $items . 's expected a number but was empty.";
            return 0;
        } else if (!is_numeric($numberOfItems)) {
            $this->error = "Number of ' . $items . 's expected a number but found '$numberOfItems'.";
            return 0;
        } else if ($numberOfItems < $min || $numberOfItems > $max) {
            $this->error = "Number of ' . $items . 's should be between '" . $min . "' and '" . $max . "', but found '$numberOfItems'.";
            return 0;
        }

        return $numberOfItems;
    }

    private function getParagraphs($numberOfParagraphs, $numberOfSentences){
        $factory = Factory::create();
        $paragraphs = [];
        for($i = 1; $i <= $numberOfParagraphs; $i++){
            $paragraph = $factory->paragraph($numberOfSentences);
            array_push($paragraphs, $paragraph);
        }

        return $paragraphs;
    }
}
