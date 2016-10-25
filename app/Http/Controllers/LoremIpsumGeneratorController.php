<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;
use Project3\Http\Requests;
use Faker\Factory;
use Storage;
use \Project3\Http\Requests\GenerateLoremIpsumRequest;

class LoremIpsumGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('lorem-ipsum-generator.index')->with([
            'MIN_NUM_PARAGRAPHS' => GenerateLoremIpsumRequest::MIN_NUM_PARAGRAPHS,
            'MAX_NUM_PARAGRAPHS' => GenerateLoremIpsumRequest::MAX_NUM_PARAGRAPHS,
            'MIN_NUM_SENTENCES' => GenerateLoremIpsumRequest::MIN_NUM_SENTENCES,
            'MAX_NUM_SENTENCES' => GenerateLoremIpsumRequest::MAX_NUM_SENTENCES
        ]);
    }

    /**
     * Show the generated Lorem Ipsum Text.
     *
     * @param GenerateLoremIpsumRequest $request
     * @return mixed
     */
    public function getLoremIpsumText(GenerateLoremIpsumRequest $request)
    {
        $data = $request->all();
        $paragraphs = $this->getParagraphs($data['number-of-paragraphs'], $data['number-of-sentences']);

        $request->flash();
        return \View::make('lorem-ipsum-generator.index')->with([
            'MIN_NUM_PARAGRAPHS' => GenerateLoremIpsumRequest::MIN_NUM_PARAGRAPHS,
            'MAX_NUM_PARAGRAPHS' => GenerateLoremIpsumRequest::MAX_NUM_PARAGRAPHS,
            'MIN_NUM_SENTENCES' => GenerateLoremIpsumRequest::MIN_NUM_SENTENCES,
            'MAX_NUM_SENTENCES' => GenerateLoremIpsumRequest::MAX_NUM_SENTENCES,
            'paragraphs' => $paragraphs
        ]);
    }

    private function getParagraphs($numberOfParagraphs, $numberOfSentences){
        $poemSentences = $this->getPoemSentences();

        $factory = Factory::create();
        $paragraphs = [];
        for($i = 1; $i <= $numberOfParagraphs; $i++){
            $paragraph = $this->getParagraph($factory, $poemSentences, $numberOfSentences);
            array_push($paragraphs, $paragraph);
        }

        return $paragraphs;
    }

    private function getParagraph($factory, $poemSentences, $numberOfSentences){
        $startingSentenceKey = $factory->randomKey($poemSentences);
        $numberOfPoemSentences = count($poemSentences);

        $paragraphSentences = [];
        for($i = 1; $i <= $numberOfSentences; $i++){
            $sentenceKey = ($startingSentenceKey + $i) % $numberOfPoemSentences;
            $sentence = $poemSentences[$sentenceKey];
            array_push($paragraphSentences, $sentence);
        }

        return implode(" ", $paragraphSentences);
    }

    private function getPoemSentences()
    {
        $contents = Storage::get("midnight_dreary.txt");
        return $this->getSentencesFromText($contents);
    }

    private function getSentencesFromText($text){
        // Regex learned from: http://stackoverflow.com/a/6360686/3500171
        $textWithoutMultipleLineBreaks = preg_replace("/[\r\n]+/", "\n", $text);
        return preg_split('/\n+/', $textWithoutMultipleLineBreaks);
    }
}
