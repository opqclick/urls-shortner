<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();

        session()->forget('warning');

        return view('short_link_vue', compact('shortLinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param GenerateShortLinkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerateShortLinkRequest $request)
    {
        $linkExists = ShortLink::where('link', $request->link)->first();

        if($linkExists){
            Session::flash('warning', 'Link already exists!');

            return view('short_link')->with('short_link', $linkExists);
        }

        $shortLink = new ShortLink();
        $shortLink->link = $request->link;
        $shortLink->code = Str::random(6);
        $shortLink->save();

        return redirect($shortLink->link);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        return redirect($find->link);
    }
}
