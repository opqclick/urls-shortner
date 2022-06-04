<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use App\Rules\SafeBrowsing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortLinkGeneratorController extends Controller
{
    public function store(Request $request){
        $response = array('success'=>false, 'message' => '', 'response' => '');

        //dd($response);

        //SafeBrowsing custom rule will go through the Google safeBrowing API v4
        $validator = Validator::make($request->all(), [
            'link' => ['required', 'url', new SafeBrowsing()]
        ]);

        //dd($validator->messages());

        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $linkExists = ShortLink::where('link', $request->link)->first();

            if($linkExists){
                // The response will load on the Frontend with old link
                // This is the only response that use can see on the HTML page
                $response = ['success'=>false, 'message'=> 'Your provided link already exists', 'response' => $linkExists];
            }else{
                $shortLink = new ShortLink();
                $shortLink->link = $request->link;
                $shortLink->code = Str::random(6);
                $shortLink->save();

                // By using this response information,
                // User will be redirected to the given link.
                $response = ['success'=>true, 'message'=> 'New short link created and link is verified by Google safe browsing API v4', 'response' => $shortLink];
            }
        }

        return response()->json($response);
    }
}
