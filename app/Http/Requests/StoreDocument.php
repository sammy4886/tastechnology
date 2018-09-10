<?php

namespace App\Http\Requests;


use App\Document;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocument extends FormRequest
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
            'title'      => 'required',
            'file' => 'file|required|max:100000'
        ];
    }

    public function data()
    {
        $path                   = Document::$path;
        $time                   = time();
        $data ['title']          = $this->get('title');
        $data['view']           = $this->get('report');
        $data ['is_published']  = $this->has('publish');

        if ($this->hasFile('file'))
        {
            if($this->file('file')->isValid())
            {
                $size        = $this->file('file')->getSize();
                $file_name   = $this->file('file')->getClientOriginalName();
                $extension   = $this->file('file')->getClientOriginalExtension();
                $name        = $time . '.' . $extension;

                $this->file('file')->move($path, $name);

                $data ['size']       = $size;
                $data ['file_name']  = $file_name;
                $data ['extension']  = $extension;
                $data ['path']       = "$name";
            }
        }

        return $data;
    }
}
