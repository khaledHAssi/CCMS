<?php

namespace App\Http\Requests;

use App\Rules\TextLength;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $req = 'required';

        if($this->method() == 'PUT') {
            $req = 'nullable';
        }

        return [
            'name' => ['required', 'min:2', 'string'],
            'image' => [$req, 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048'],
            'description' => ['required', new TextLength(5)]
            // 'description' => 'required'
        ];
    }
}
