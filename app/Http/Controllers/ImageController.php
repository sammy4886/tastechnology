<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Album;
use DateTime;
use Validator;
use App\Http\Requests;
use App\Image;

class ImageController extends Controller
{
    const IMAGE_PATH = 'images/';

    const THUMBNAIL_PATH = 'thumbnails/';

    private $request;
    private $mimes = [
        'png' => 'image/png',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpg',
        'gif' => 'image/gif',
    ];

    /**
     * ImageController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $file
     * @param string $path
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function thumbnail($file, $path = self::THUMBNAIL_PATH)
    {
        $prop = explode('.',$file);
        $ext = strtolower(end($prop));
        $mime = array_key_exists($ext,$this->mimes) ? $this->mimes[$ext] : FALSE;
        if(FALSE == $mime || FALSE == file_exists($path)) abort(404, 'Resource not found');
        return $this->getImage($path.$file,$mime);
    }

    /**
     * @param $file
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function image($file)
    {
        $prop = explode('.',$file);
        $ext = strtolower(end($prop));
        $mime = array_key_exists($ext,$this->mimes) ? $this->mimes[$ext] : FALSE;
        $path = self::IMAGE_PATH.$file;
        if(FALSE == $mime || FALSE == file_exists($path)) abort(404, 'Resource not found');
        return $this->getImage($path,$mime);
    }

    /**
     * @param $path
     * @param $mime
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    private function getImage($path, $mime){
        $request = $this->request;
        $size = filesize($path);
        $file = file_get_contents($path);
        $headers = [
            'Content-Type' => $mime,
            'Content-Length' => $size
        ];
        $response = response( $file, 200, $headers );
        $fileTime = filemtime($path);
        $etag = md5($fileTime);
        $time = date('r', $fileTime);
        $expires = date('r', $fileTime + 3600);

        $response->setEtag($etag);
        $response->setLastModified(new DateTime($time));
        $response->setExpires(new DateTime($expires));
        $response->setPublic();

        if($response->isNotModified($request)) return $response;
        return $response->prepare($request);
    }
// Album Controller 

    public function getForm($id)
    {
        $album = Album::find($id);
        return view('backend.album.addimage')->with('album', $album);
    }
    private function uploadImages($request)
    {
        if ($request->hasFile('cover_image')) {
            $doc = $request->file('cover_image');
            $names = [];
            foreach ($doc as $file) {
                array_push($names, $file);
            }
            foreach ($names as $name) {
                $random_name     = str_random(8);
                $destinationPath = 'albums/';
                $extension       = $name->getClientOriginalExtension();
                $filename        = $random_name . '_album_image.' . $extension;
                $uploadSuccess   = $name->move($destinationPath, $filename);
                Image::create([
                    'description' => $request->get('description'),
                    'image'       => $filename,
                    'album_id'    => $request->get('album_id')
                ]);
            }
        }
    }
    public function postAdd(Request $request)
    {
        if ($request->hasFile('cover_image')) {
            $doc = $request->file('cover_image');
            $names = [];
            foreach ($doc as $file) {
                array_push($names, $file);
            }
            foreach ($names as $name) {

                $random_name     = str_random(8);
                $destinationPath = 'albums/';
                $extension       = $name->getClientOriginalExtension();
                $filename        = $random_name . '_album_image.' . $extension;
                $uploadSuccess   = $name->move($destinationPath, $filename);
                Image::create([
                    'description' => $request->get('description'),
                    'image'       => $filename,
                    'album_id'    => $request->get('album_id')
                ]);
            }
        }
        return redirect()->route('album.show_album', [ 'id' => $request->get('album_id') ]);
    }
    public function getDelete($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('album.show_album', [ 'id' => $image->album_id ]);
    }
    public function postMove(Request $request)
    {
        $rules = [
            'new_album' => 'required|numeric|exists:albums,id',
            'photo'     => 'required|numeric|exists:images,id'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return redirect()->route('album.index');
        }
        $image           = Image::find($request->get('photo'));
        $image->album_id = $request->get('new_album');
        $image->save();
        return redirect()->route('album.show_album', [ 'id' => $request->get('new_album') ]);
    }
}
