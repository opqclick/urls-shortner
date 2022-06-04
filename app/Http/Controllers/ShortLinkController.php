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

        return view('short_link', compact('shortLinks'));
    }

}
