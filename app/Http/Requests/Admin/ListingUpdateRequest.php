<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ListingUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer'],
            'location' => ['nullable', 'integer'],
            'image' => ['nullable','image', 'max:3000'],
            'thumbnail_image' => ['nullable','image', 'max:3000'],
            'old_image' => ['nullable'],
            'old_thumbnail_image' => ['nullable'],
            'old_attachment' => ['nullable'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'facebook_link' => ['nullable','url'],
            'x_link' => ['nullable','url'],
            'linkedin_link' => ['nullable','url'],
            'whatsapp_link' => ['nullable','url'],
            'attachment' => ['nullable','mimes:png,jpg,csv,pdf', 'max:10000'],
            'amenities.*' => ['nullable', 'integer'],
            'description' => ['required'],
            'google_map_embed_code' => ['nullable'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean']
        ];
    }
}
