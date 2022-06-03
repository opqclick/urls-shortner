<?php

namespace App\Http\Requests;

use App\Rules\SafeBrowsing;
use Illuminate\Foundation\Http\FormRequest;

class GenerateShortLinkRequest extends FormRequest
{
    /**
     * Force response json type when validation fails
     * @var bool
     */

    //protected $forceJsonResponse = true;

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
            'link' => ['required', 'url', new SafeBrowsing()]
        ];
    }


}
