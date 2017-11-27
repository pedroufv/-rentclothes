<?php

namespace App\Http\Requests;

class Phone extends Request
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "number" => "required",
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['number'] = $this->onlyDigits($input['number']);

        $this->replace($input);

        return $this->all();
    }

    public function onlyDigits($text)
    {
        return preg_replace('/\D/', '', $text);
    }
}
