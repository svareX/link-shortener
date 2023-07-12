<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    //
    public function index()
    {
        return view('index')->with('links', Link::orderBy('created_at', 'desc')->get()->take(5));
    }
    //
    public function create()
    {
        return view('create');
    }

    //
    public function store(LinkRequest $request)
    {
        Link::create([
            'url_long' => $request->url_long,
            'url_short' => $request->url_short ? $request->url_short : Str::random(6),
        ]);
        return redirect()->route('links.index')->with('success', 'Link created successfully.');
    }

    //
    public function show($url_short): RedirectResponse
    {
        $link = Link::where('url_short', $url_short)->first();
        return redirect()->away($link->url_long);
    }

    //
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link deleted successfully.');
    }
}
