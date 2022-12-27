<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuoteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //jika ada table yang unik
            // 'text' => 'required|min:10'. Rule::unique('quotes')->ignore($this->quote),

            'text' => 'required|min:10',
            'author' => 'required|min:5',
        ];
    }
}
