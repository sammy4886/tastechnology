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

    public function about()
    {
        $team = Team::latest()->get();

        return view('frontend.pages.about', compact('team'));
    }

    public function tradingSystem()
    {

        return view('frontend.pages.trading_system');
    }

    public function meetteam()
    {
        $team = Team::latest()->get();
        return view('frontend.pages.meetteam', compact('team'));
    }

    public function contact()
    {
        return view('frontend.partials.contact');
    }
    public function disclaimer()
    {
        return view('frontend.pages.disclamer');
    }

    public function downloads()
    {
        $documents = Document::orderBy('id', 'DESC')->where('view', 'Downloads')->get();
        return view('frontend.pages.downloads', compact('documents'));
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function noticelist(){
        return view('frontend.partials.noticelist');
    }

    public function noticepage($path)
    {
        $backnotice = Notice::where('title', $path)->latest()->get();
        $backnotices = Notice::latest()->get();
        return View('frontend.partials.noticepage', compact('backnotice','backnotices'));
    }

    public function registration()
    {
        return view('frontend.pages.registration');
    }
}
