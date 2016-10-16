<?php

namespace Project3\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateLoremIpsumRequest extends BuildableFormRequest
{
    const MIN_NUM_PARAGRAPHS = 1;
    const MAX_NUM_PARAGRAPHS = 99;
    const MIN_NUM_SENTENCES = 1;
    const MAX_NUM_SENTENCES = 99;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRuleBuilder()
            ->add('number-of-paragraphs')->required()->min(self::MIN_NUM_PARAGRAPHS)->max(self::MAX_NUM_PARAGRAPHS)->numeric()
            ->add('number-of-sentences')->required()->min(self::MIN_NUM_SENTENCES)->max(self::MAX_NUM_SENTENCES)->numeric()
            ->get();
    }
}