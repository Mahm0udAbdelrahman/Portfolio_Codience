<?php
namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name_company'          => 'nullable|string|max:255',
            'logo'                  => 'nullable|image',
            'image'                 => 'nullable|image',
            'title_ar'              => 'nullable|string|max:255',
            'title_en'              => 'nullable|string|max:255',
            'description_ar'        => 'nullable|string|max:100000',
            'description_en'        => 'nullable|string|max:100000',
            'description_footer_ar' => 'nullable|string|max:100000',
            'description_footer_en' => 'nullable|string|max:100000',
            'address_ar'            => 'nullable|string|max:255',
            'address_en'            => 'nullable|string|max:255',
            'email'                 => 'nullable|email',
            'phone'                 => 'nullable|string|max:50',
            'twitter'               => 'nullable|string|max:255',
            'facebook'              => 'nullable|string|max:255',
            'instagram'             => 'nullable|string|max:255',
            'linkedin'              => 'nullable|string|max:255',
            'whatsapp'              => 'nullable|string|max:255',
        ];
    }
}
