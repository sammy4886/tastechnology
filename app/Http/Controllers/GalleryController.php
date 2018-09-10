<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGallery;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGallery;
use App\Http\Requests;
use App\Gallery;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    const THUMBNAIL_PATH = 'thumbnails/';

    public function index()
    {
        $gallery = Gallery::orderBy('id', 'ASC')->get();

        return view('backend.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(StoreGallery $request)
    {

        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $gallery = Gallery::create($data);

            $gallery->image()->create([])->setPath($request->image);
        });

        return redirect()->route('gallery.index')->withSuccess(trans('Image has been added successfully', [ 'entity' => 'Gallery' ]));
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    public function update(UpdateGallery $request, Gallery $gallery)
    {
        DB::transaction(function () use ($request, $gallery)
        {

            $data = $request->data();

            $gallery->update($data);

            if ($request->image)
            {
                $gallery->image->setPath($request->image);
            }
        });

        return redirect()->route('gallery.index')->with('success', 'Gallery has been updated');
    }

    public function delete(Gallery $gallery)
    {
        $gallery->delete();

        return back()->with('success', 'recruitment step has been deleted');
    }

    public function thumbnail($file, $path = self::THUMBNAIL_PATH)
    {
        $prop = explode('.',$file);
        $ext = strtolower(end($prop));
//        $mime = array_key_exists($ext,$this->mimes) ? $this->mimes[$ext] : FALSE;
//
//        if(FALSE == $mime || FALSE == file_exists($path)) abort(404, 'Resource not found');
//
//        return $this->getImage($path.$file,$mime);
    }

}
