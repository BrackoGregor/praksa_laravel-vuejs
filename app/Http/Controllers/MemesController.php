<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Meme;

class MemesController extends Controller
{
    public function show($slug)
    {
        return view('content', [
            'content' => $Meme::get()
        ]);
    }

    public function index()
    {
        $memes = Meme::latest()->get();
        return view('memes.index', ['memes' => $memes]);
    }

    public function create()
    {
        return view('memes.create');
    }

    public function store()
    {
        //dump(request()->all());

        $meme = new Meme();

        $meme->title = request('title');
        $meme->description = request('description');
        $meme->title = request('photo');

        $meme->save();

        return redirect('/');
    }
}
