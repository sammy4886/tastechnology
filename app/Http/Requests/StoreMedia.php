<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedia extends FormRequest
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
            'title'   => 'required|max:200',
            'content' => 'required',
            'image'   => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'title'            => $this->get('title'),
            'meta_description' => $this->get('meta_description'),
            'content'          => $this->get('content'),
            'view'             => empty($this->get('view')) ? 'frontend.media.show' : $this->get('view'),
            'is_published'     => $this->has('publish'),
        ];

        return $data;
    }
}