<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeValidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:employees',
            'phone' => 'numeric|unique:employees|digits:10|required_if:email,null',
            'salary' => 'numeric|required',
            'skills' => 'required|array',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // Custom response structure with failure message
        $response = [
            'status' => 'error',
            'message' => 'There were validation issues with your request. Please check the errors below.',
            'errors' => $validator->errors(),
        ];

        // Throw the custom response with 422 status code for validation failure
        throw new HttpResponseException(
            response()->json($response, 422)
        );
    }
}
