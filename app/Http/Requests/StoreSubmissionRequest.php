<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:1500',
            'app' => 'nullable|string|max:255',
            'to' => 'nullable|string|max:255',
            'honeypot' => 'nullable|boolean',
        ];
    }
}
