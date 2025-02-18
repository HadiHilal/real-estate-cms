<?php

namespace Modules\Contact\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'phone_code' => 'required',
            'phone_number' => 'required|numeric|min:5',
            'email' => 'nullable|email',
            'subject' => 'nullable|string|min:3',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return auth()->user()->can('users.create');
    }
}
