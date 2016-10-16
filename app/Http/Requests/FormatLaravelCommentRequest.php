<?php

namespace Project3\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormatLaravelCommentRequest extends BuildableFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRuleBuilder()
            ->add('title')->required()
            ->add('comment')->required()
            ->get();
    }
}