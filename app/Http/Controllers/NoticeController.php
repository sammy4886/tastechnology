<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotice;
use App\Http\Requests\UpdateNotice;
use App\Notice;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function index()
    {
        $notice = Notice::orderBy('id', 'ASC')->get();

        return view('backend.notice.index', compact('notice'));
    }

    public function create()
    {
        Notice::all();

        return view('backend.notice.create');
    }

    public function Store(StoreNotice $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $notice = Notice::create($data);

            $this->uploadRequestImage($request, $notice);
        });

        return redirect()->route('notice.index')->withSuccess(trans('Notice has been added successfully', [ 'entity' => 'Notice' ]));
    }
    public function update(UpdateNotice $request, Notice $notice)
    {
        DB::transaction(function () use ($request, $notice)
        {

            $data = $request->data();
            $notice->update($data);

            $this->uploadRequestImage($request, $notice);

        });

        return redirect()->route('notice.index')->with('success', 'Notice has been updated');
    }
    public function edit(Notice $notice)
    {
        return view('backend.notice.edit', compact('notice'));
    }

    public function delete(Notice $notice)
    {
        $notice->delete();

        return back()->with('success', 'notice step has been deleted');
    }

    public function show(Notice $notice)
    {
        return view('frontend.partials.shownotice',compact('notice'));
    }
}
