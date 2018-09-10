<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGallery extends FormRequest
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
            'image' => 'image|required|max:10000'

        ];
    }

    public function data()
    {
        $data = [
            'user_id' => auth()->id(),
            'name' => $this->get('name'),
            'meta_description' => $this->get('meta_description'),
            'is_published' => $this->has('publish'),
            'view' => $this->get('imageSection')
        ];

        return $data;
    }
}