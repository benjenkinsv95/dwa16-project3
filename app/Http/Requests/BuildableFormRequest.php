<?php

namespace Project3\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Fadion\Rule\Rule;

class BuildableFormRequest extends FormRequest
{
    private $ruleBuilder;

    public function __construct() {
        parent::__construct();
        $this->ruleBuilder = new Rule();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return \Fadion\Rule\Rule A builder for rules and messages.
     */
    protected function getRuleBuilder(){
        return $this->ruleBuilder;
    }

}
