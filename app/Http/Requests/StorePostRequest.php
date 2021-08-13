<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'excerpt' => ['required', 'string', 'max:200'],
            'content' => ['required'],
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['thumbnail' => ['required']];
        } else {
            $rules += ['thumbnail' => ['nullable']];
        }

        return $rules;
    }

}
