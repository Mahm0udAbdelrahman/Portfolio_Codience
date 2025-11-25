<?php
namespace App\Http\Requests\Dashboard\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_ar'               => 'nullable|string|max:255',
            'title_en'               => 'nullable|string|max:255',
            'description_ar'         => 'nullable|string',
            'description_en'         => 'nullable|string',
            'image'                  => 'nullable|image',
            'sub_title_one_ar'       => 'nullable|string|max:255',
            'sub_title_one_en'       => 'nullable|string|max:255',
            'sub_description_one_ar' => 'nullable|string',
            'sub_description_one_en' => 'nullable|string',
            'sub_title_two_ar'       => 'nullable|string|max:255',
            'sub_title_two_en'       => 'nullable|string|max:255',
            'sub_description_two_ar' => 'nullable|string',
            'sub_description_two_en' => 'nullable|string',
        ];
    }
}
