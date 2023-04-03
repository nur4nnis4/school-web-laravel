<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        /**
         * Check authorization 
         * Return true if app request doesn't need authorization
         *  */
        return true;
    }

    public function attributes(): array
    {
        /**
         * change field name in error message
         * ex: The class id field is required => The class field is required
         */
        return [
            'class_id' => 'class',
        ];
    }

    public function messages(): array
    {
        /**
         * change error message
         * ex: The nis field must be a number. => Nis harus berupa angka
         */
        return [
            'nis.numeric' => 'Nis harus berupa angka',
            'name.max' => 'Name maksimal :max karakter' // :max is dynamic message
        ];
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'gender' => 'required',
            'class_id' => 'required',
            'nis' => 'required|unique:students|numeric',
        ];
    }
}
