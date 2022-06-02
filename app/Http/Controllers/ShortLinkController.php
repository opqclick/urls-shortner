<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateShortLinkRequest;
use App\Models\ShortLink;
use Illuminate\Http\Request;
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

        //return view('short_link', compact('shortLinks'));
        return view('form', compact('shortLinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param GenerateShortLinkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerateShortLinkRequest $request)
    {
        $shortLink = new ShortLink();
        $shortLink->link = $request->link;
        $shortLink->code = Str::random(6);
        $shortLink->save();

        return redirect('generate-shorten-link')
            ->with('success', 'Short Link Generated Successfully!');
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
