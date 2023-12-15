<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "prompt" => ["string", "required"],
            "width" => ["integer"],
            "height" => ["integer"],
        ];
    }
}
