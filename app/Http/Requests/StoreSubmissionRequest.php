<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'app' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'to' => 'nullable|string|max:255',
            'key' => 'nullable|string|max:255',
            'message' => 'required|string|max:1500',
            'honeypot' => 'nullable|boolean',
        ];
    }

    public function validationData()
    {
        $data = parent::validationData();

        if (! array_key_exists('app', $data)) {
            $data['app'] = config('app.name');
        }
        if (! array_key_exists('to', $data)) {
            $data['to'] = 'default';
        }

        return $data;
    }
}
