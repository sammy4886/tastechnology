<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotice extends FormRequest
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

    public function rules()
    {
        return [
            'image'         => 'image|required|max:10000'

        ];
    }

    public function data()
    {
        $data = [
            'user_id'              => auth()->id(),
            'title'                 => $this->get('title'),
            'author'                 => $this->get('author'),
            'meta_description'     => $this->get('meta_description'),
            'is_published'          => $this->has('publish'),
            'view'                  => $this->get('imageSection'),
            'content'          => $this->get('content'),
            'quote'          => $this->get('quote'),
            'type'          => $this->get('type')
        ];
        return $data;
    }
}
