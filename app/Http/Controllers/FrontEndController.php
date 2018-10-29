<?php

namespace App\Http\Controllers;

use App\Team;
use App\Gallery;
use App\Album;
use App\Document;
use Goutte\Client;
use App\Notice;
use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;


class FrontEndController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function web()
    {
        return view('pages.web');
    }

    public function business()
    {
        return view('pages.e-business');
    }

    public function portal()
    {
        return view('pages.portal');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    //Album FrontEnd
    public function album()
    {
        $albums = Album::with('Photos')->get();

        return view('frontend.partials.album', compact('albums'));
    }

    public function gallery($id)
    {
        $gallery = Gallery::where('view', 'Gallery')->get();
        $album = Album::with('Photos')->find($id);
        $albums = Album::with('Photos')->get();

        return view('frontend.partials.gallery', compact('gallery', 'album', 'albums'));
    }


    public function noticepage($path)
    {
        $backnotice = Notice::where('title', $path)->latest()->get();
        $backnotices = Notice::latest()->get();
        return View('frontend.partials.noticepage', compact('backnotice', 'backnotices'));
    }

    public function registration()
    {
        return view('frontend.pages.registration');
    }

    public function software()
    {
        return view('frontend.page.software');
    }
}
