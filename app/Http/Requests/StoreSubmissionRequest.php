<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'message' => 'required|string|max:1500',
            'extras' => 'nullable|array',
            'app_name' => 'nullable|string|max:255',
            'send_to' => 'nullable|string|max:255',
            'honeypot' => 'nullable|boolean',
        ];
    }
}
