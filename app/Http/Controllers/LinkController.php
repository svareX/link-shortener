<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class LinkController extends Controller
{

    //
    public function create()
    {
        return view('create');
    }

    //
    public function store(LinkRequest $request)
    {
        $link = Link::create([
            'url_long' => $request->url_long,
            'url_short' => $request->url_short ? $request->url_short : Str::random(6),
        ]);
        return view('create')->with('link', $link);
    }

    //
    public function show($url_short): RedirectResponse
    {
        if ($url_short == 'links') {
            return redirect()->route('links.create');
        }
        $link = Link::where('url_short', $url_short)->first();
        return redirect()->away($link->url_long);
    }
}
