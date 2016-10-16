<?php

namespace Project3\Http\Controllers;

use Illuminate\Http\Request;
use Project3\Http\Requests\FormatLaravelCommentRequest;


class LaravelCommentFormatterController extends Controller
{
    const PLACEHOLDER_COMMENT = "This tool will format your text in the style of a Laravel comment. Enter a paragraph of text and try it out for yourself! Once upon a midnight dreary, fingers cramped and vision bleary...";
    const PLACEHOLDER_TITLE = "Laravel Comment Formatter";
    const FORMATTED_COMMENT_TITLE_HEADER = "/*
|--------------------------------------------------------------------------
| ";
    const FORMATTED_COMMENT_TITLE_FOOTER ="
|--------------------------------------------------------------------------
| 
";
    const FORMATTED_COMMENT_FOOTER = "
|
*/";
    const MAX_LINE_LENGTH = 74;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laravel-comment-formatter.index',
            array('PLACEHOLDER_COMMENT' => self::PLACEHOLDER_COMMENT,
                'PLACEHOLDER_TITLE' => self::PLACEHOLDER_TITLE,
                'formattedComment' => $this->getFormattedComment(self::PLACEHOLDER_TITLE, self::PLACEHOLDER_COMMENT)));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormatLaravelCommentRequest $request)
    {
        $data = $request->all();
        $request->flash();
        return view('laravel-comment-formatter.index',
            array('PLACEHOLDER_COMMENT' => self::PLACEHOLDER_COMMENT,
                'PLACEHOLDER_TITLE' => self::PLACEHOLDER_TITLE,
                'formattedComment' => $this->getFormattedComment($data['title'], $data['comment'])));
    }

    private function getFormattedComment($title, $rawComment){
        $formattedTitle = self::FORMATTED_COMMENT_TITLE_HEADER . $title . self::FORMATTED_COMMENT_TITLE_FOOTER;
        $formattedParagraphs = $this->getFormattedParagraphs($rawComment);
        return $formattedTitle . $formattedParagraphs . SELF::FORMATTED_COMMENT_FOOTER;
    }

    private function getFormattedParagraphs($textContent){
        $paragraphs = $this->getParagraphs($textContent);

        $formattedParagraphs = [];
        foreach($paragraphs as $paragraph){
            $formattedParagraph = $this->getFormattedParagraph($paragraph);
            array_push($formattedParagraphs, $formattedParagraph);
        }

        return implode("\n|\n", $formattedParagraphs);
    }

    private function getFormattedParagraph($paragraph){
        $words = $this->getWords($paragraph);

        $maxLineLength = self::MAX_LINE_LENGTH;
        $formattedParagraph = "|";
        foreach($words as $word){
            $newLinePos = strrpos($formattedParagraph, "\n") ? strrpos($formattedParagraph, "\n") : 0;
            $lineLength = strlen($formattedParagraph) - $newLinePos;
            $wordLength = strlen($word);
            $spaceLength = 1;

            if ($lineLength + $wordLength + $spaceLength > $maxLineLength){
                $maxLineLength = $lineLength - 3;
                $formattedParagraph .= "\n| ";
            }else {
                $formattedParagraph.= " ";
            }

            $formattedParagraph.= $word;
        }

        return $formattedParagraph;
    }

    private function getParagraphs($str){
        // Regex from: http://stackoverflow.com/a/6360686/3500171
        $textWithoutMultipleLineBreaks = preg_replace("/[\r\n]+/", "\n", $str);
        return preg_split('/\n+/', $textWithoutMultipleLineBreaks);
    }

    private function getWords($str){
        return preg_split('/\s+/', $str);
    }
}
