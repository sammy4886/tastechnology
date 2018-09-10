<?php
namespace App\Http\Controllers;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AlbumController extends Controller
{

     public function getList()
  {
      $albums = Album::with('Photos')->get();
      return view('backend.album.index')->with('albums',$albums);
  }

  public function getAlbum($id)
  {
      $album = Album::with('Photos')->find($id);
      $albums = Album::with('Photos')->get();
      return view('backend.album.album', ['album'=>$album, 'albums'=>$albums]);
  }

  public function getForm()
  {
      return view('backend.album.createalbum');
  }

  public function postCreate(Request $request)
  {

      $rules = ['name' => 'required', 'cover_image'=>'required|image'];

      $input = ['name' => null];

      //Validator::make($input, $rules)->passes(); // true

      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){
        // return Redirect::route('create_album_form') ;
        return redirect()->route('album.createalbum')->withErrors($validator)->withInput();
      }

      // $file = Input::file('cover_image');
      $file = $request->file('cover_image');
      $random_name = str_random(8);
      $destinationPath = 'albums/';
      $extension = $file->getClientOriginalExtension();
      $filename=$random_name.'_cover.'.$extension;
      $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
      $album = Album::create(array(
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'cover_image' => $filename,
      ));

      return redirect()->route('album.show_album',['id'=>$album->id]);
  }

  public function getDelete($id)
  {
      $album =Album::where('id',$id);

      $album->delete();

      return Redirect::route('album.index');
  }
}
