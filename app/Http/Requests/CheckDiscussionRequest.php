<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckDiscussionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method())
        {
            case 'POST':
            return [
                'title' => 'required|min:3',
                'content' => 'required',
                'channel_id' => 'required',
            ];

            case 'PUT':
            case 'PATCH':
            return [
                'title' => 'required|',
                'content' => 'required|',
                'channel_id' => 'required|',
            ];

            case 'DELETE';
            default:
                return [];
        }
    }
}
