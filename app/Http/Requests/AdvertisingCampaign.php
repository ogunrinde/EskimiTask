<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingCampaign extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|string",
            'from_date' => "required|date|before:to_date",
            'to_date' => "required|date|after:from_date",
            'total_budget' => "required|numeric",
            'daily_budget' => "required|numeric",
            'images.*' => "required|mimes:png,jpg,jpeg|max:2048"
        ];
    }
}
