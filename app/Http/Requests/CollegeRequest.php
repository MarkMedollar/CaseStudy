<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5','max:255'],
            'address' => ['required', 'string','min:5','max:100'],
            'latitude' => ['required','decimal:2,17'],
            'longitude' => ['required','decimal:2,17'],
            'website' => ['nullable','string'],
            'contact_number' => ['nullable','string'],
        ];
    }

    public function messages() //error messages validation and customization
    {
        return
        [
            'name.required' => 'HEI name cannot be emppty',
            'name.string' => 'HEI name must be string',
            'name.min' => 'Minimum character number of HEI Name is 5',
            'name.max' => 'Maximum character number of HEI Name is 225',

            'address.required' => 'Please input HEI Address',
            'address.string' => 'HEI Address must be string',
            'address.min' => 'Minimum character number of HEI Address is 5',
            'address.max' => 'Maximum character number of HEI Address is 100',

            'latitude.required' => 'Please input latitude coordinates',
            'latitude.decimal' => 'Please input valid latitude coordinates',

            'longitude.required' => 'Please input longitude coordinates',
            'longitude.decimal' => 'Please input valid longitude coordinates',

            'website.string' => 'Please Input valid website name',
            'contact_number.string' => 'Please Input valid contact number',

        ];
    }
}
