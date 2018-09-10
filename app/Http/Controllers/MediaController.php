<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedia;
use App\Http\Requests\UpdateMedia;
use App\Media;
use App\SubMenu;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::latest()->get([ 'slug', 'title', 'is_published' ]);
        return view('backend.media.index', compact('medias'));
    }
    public function create()
    {
        return view('backend.media.create');
    }

    public function store(StoreMedia $request)
    {
        DB::transaction(function () use ($request) {

            $data = $request->data();

            $media = Media::create($data);

            $this->uploadRequestImage($request, $media);
        });
        return redirect()->route('media.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Media' ]));
    }

    /**
     * @param UpdateMedia $request
     * @param Media $media
     * @return mixed
     */
    public function update(UpdateMedia $request, Media $media)
    {
        DB::transaction(function () use ($request, $media)
        {
            $media->update($request->data());

            if ($request->image)
            {
                $media->image->setPath($request->image);
            }
        });

        return redirect()->route('media.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Media' ]));
    }

    /**
     * @param Media $media
     * @return mixed
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Media' ]));
    }

    public function edit(Media $media)
    {
        return view('backend.media.edit', compact('media'));
    }
    public function show(Media $media)
    {
        return view('frontend.partials.showmedia',compact('media'));
    }

}
