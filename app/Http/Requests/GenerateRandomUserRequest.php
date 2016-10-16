<?php

namespace Project3\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateRandomUserRequest extends BuildableFormRequest
{
    const MIN_NUM_USERS = 1;
    const MAX_NUM_USERS = 50;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->getRuleBuilder()
            ->add('number-of-users')->required()->min(self::MIN_NUM_USERS)->max(self::MAX_NUM_USERS)->numeric()
            ->get();
    }
}