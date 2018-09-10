<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Document;


class UpdateDocument extends FormRequest
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

    public function rules()
    {
        return [
            'title'      => 'required',
            'file' => 'file|required|max:100000'
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

}
