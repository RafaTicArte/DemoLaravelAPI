<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * https://laravel.com/docs/9.x/validation#available-validation-rules
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:2',
            'description' => 'required|string|min:5',
            'extra.pages' => 'required|int|min:1',
        ];
    }

    /**
     * Throw exception if request is failed.
     *
     * @param  Validator  $validator
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors(),
        ]));
    }

    /**
     * Custom messages validation (optional).
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title minimum lenght is 2 characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description minimum lenght is 5 characters',
            'extra.pages.min' => 'Pages must be a positive integer',
        ];
    }
}
