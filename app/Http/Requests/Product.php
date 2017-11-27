<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends Request
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
            "description" => "required",
            "size" => "required",
            "price" => "required",
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['price'] = $this->moeda($input['price']);

        $this->replace($input);

        return $this->all();
    }

    protected function moeda($value) {

        return str_replace(',', '.', str_replace('.', '', $value));
    }
}
