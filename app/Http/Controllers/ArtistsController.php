<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\actions\UtilitiesController;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
    }

    // Display All artists in the admin dashboard
    public function all()
    {
        $new = new Artists();
        $artists = $new->getArtists();
        return view('artists.all')->with('artists', $artists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'bio' => 'required',
            'art_img' => 'image|nullable|max:2999'
        ]);

        $image = $request->file('art_img');
        //Handle file up0loads
        if ($request->hasFile('art_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $artist = new Artists;
        $artist->name = $request->input('name');
        $artist->bio = $request->input('bio');
        $artist->picture = $fileNameToStore;
        $artist->save();

        return redirect('/artists/all')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artists::find($id);
        return view('artists.edit')->with('post', $artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'bio' => 'required',
            'art_img' => 'image|nullable|max:2999'
        ]);
        $image = $request->file('art_img');
        //Handle file up0loads
        if ($request->hasFile('art_img')) {
            $call = new UtilitiesController();
            $fileNameToStore = $call->fileNameToStore($image);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $artist = Artists::find($id);
        $artist->name = $request->input('name');
        $artist->bio = $request->input('bio');
        if ($request->hasFile('art_img')) {
            $artist->picture = $fileNameToStore;
        }
        $artist->save();

        return redirect('/artists/all')->with('success', 'Post edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // Archive artist
    public function disable($id)
    {
        $artist = Artists::find($id);
        $artist->disabled = 'true';
        $artist->save();
        return redirect('/artists/all')->with('success', 'Post Disabled');
    }

    // Restore Disabled artist
    public function restore($id)
    {
        $artist = Artists::find($id);
        $artist->disabled = 'false';
        $artist->save();
        return redirect('/artists/disabled')->with('success', 'Post Restored');
    }

    // Display Disabled artists
    public function disabled()
    {
        $new = new Artists();
        $d_artists = $new->getDisartists();
        return view('artists.disabled')->with('artists', $d_artists);
    }
}
