<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGallery extends FormRequest
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

    public function data()
    {
        $data = [
            'name'             => $this->get('name'),
            'meta_description' => $this->get('meta_description'),
            'is_published'     => $this->has('publish'),
            'view'             => $this->get('imageSection')
        ];

        return $data;
    }

    public function rules()
    {
        return [
            'name'             => 'required|max:200',
            'meta_description' => 'required',
            'image'            => 'image|max:2048'
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

}
