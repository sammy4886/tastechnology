<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\StoreDocument;
use App\Http\Requests\UpdateDocument;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::orderBy('id', "ASC")->get();

        return view('backend.document.index', compact('documents'));
    }


    public function create()
    {
        return view('backend.document.create');
    }

    public function store(StoreDocument $request)
    {
        DB::transaction(function () use ($request)
        {
            Document::create($request->data());
        });

        return redirect()->route('document.index')->withSuccess('document has been stored successfully');
    }

    public function edit(Document $document)
    {
        return view('backend.document.edit', compact('document'));
    }

    public function update(UpdateDocument $request, Document $document)
    {
        DB::transaction(function () use ($request, $document)
        {
            $document->update($request->data($document));
        });

        return redirect()->route('document.index')->withSuccess('document has been updated');
    }

    public function destroy(Document $document)
    {
        {

            $document->delete();

            return back()->withSuccess('document has been successfully deleted.');
        }
    }
    public function publishUpdate(UpdatePublish $request, Documents $documents)
    {
        DB::transaction(function() use($request, $documents)
        {
            $data = $request->data();
            $documents->update($data);
        });

        return redirect()->route('document.index', compact('documents'));
    }

}
