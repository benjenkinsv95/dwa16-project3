<?php

namespace Project3\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneratePasswordRequest extends BuildableFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRuleBuilder()
            ->add('number-of-words')->required()->min(1)->max(9)->numeric()
            ->get();
    }
}
