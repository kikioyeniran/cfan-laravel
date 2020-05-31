<?php

namespace App\Http\Controllers;

use App\art_category;
use App\Artists;
use App\Artworks;
use Illuminate\Http\Request;
use App\Http\Controllers\actions\UtilitiesController;

class ArtWorksController extends Controller
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


    public function adminDisplayByCat($link)
    {
        $new = new Artworks();
        $art_arr = $new->getArtWorksByLink($link);
        $artworks = $art_arr[0];
        $cat_name = $art_arr[1];
        return view("artworks.admin")->with('artworks', $artworks)->with('cat_name', $cat_name);
    }
    public function displayByCat($link)
    {
        $new = new Artworks();
        $art_arr = $new->getArtWorksByLink($link);
        $artworks = $art_arr[0];
        $cat_name = $art_arr[1];
        return view("artworks.index")->with('artworks', $artworks)->with('cat_name', $cat_name);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = art_category::orderBy('created_at', 'desc')->get();
        $catOptions = array('' => 'Select Category') + $categories->pluck('name', 'id')->toArray();
        $artworks = Artists::orderBy('created_at', 'desc')->get();
        $artOptions = array('' => 'Select artworks') + $artworks->pluck('name', 'id')->toArray();
        return view("artworks.create")->with('catOptions', $catOptions)->with('artOptions', $artOptions);
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
            'category' => 'required',
            'artist' => 'required',
            'measurement' => 'required',
            'description' => 'required',
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
        $artworks = new Artworks;
        $artworks->category_id = $request->input('category');
        $artworks->artist_id = $request->input('artist');
        $artworks->measurement = $request->input('measurement');
        $artworks->description = $request->input('description');
        $artworks->picture = $fileNameToStore;
        $artworks->save();

        // var_dump($artworks->category_id);
        $cid = $artworks->category_id;
        $new = new art_category();
        $link = $new->getLink($cid);
        // var_dump($link);
        // return redirect('/artworks/admin/' . $link)->with('success', 'Post created');
        return redirect('/artworks/admin/' . $link)->with('success', 'Post created');
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
        $categories = art_category::orderBy('created_at', 'desc')->get();
        $catOptions = array('' => 'Select Category') + $categories->pluck('name', 'id')->toArray();
        $artworks = Artists::orderBy('created_at', 'desc')->get();
        $artOptions = array('' => 'Select artworks') + $artworks->pluck('name', 'id')->toArray();
        $main_artworks = Artworks::find($id);
        return view('artworks.edit')->with('post', $main_artworks)->with('catOptions', $catOptions)->with('artOptions', $artOptions);
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
            'category' => 'required',
            'artist' => 'required',
            'measurement' => 'required',
            'description' => 'required',
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
        $artworks = Artworks::find($id);;
        $artworks->category_id = $request->input('category');
        $artworks->artist_id = $request->input('artist');
        $artworks->measurement = $request->input('measurement');
        $artworks->description = $request->input('description');
        if ($request->hasFile('art_img')) {
            $artworks->picture = $fileNameToStore;
        }
        $artworks->save();

        $new = new art_category();
        $link = $new->getLink($artworks->category_id);

        return redirect('/artworks/admin/' . $link)->with('success', 'Post created');
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
    // Archive artworks
    public function archive($id)
    {
        $artworks = Artworks::find($id);
        $artworks->archived = 'true';
        $cid = $artworks->category_id;
        $artworks->save();
        $new = new art_category();
        $link = $new->getLink($cid);
        return redirect('/artworks/admin/' . $link)->with('success', 'Post archived');
    }

    // Restore archived artworks
    public function restore($id)
    {
        $artworks = Artworks::find($id);
        $artworks->archived = 'false';
        $artworks->save();
        return redirect('/artworks/archived')->with('success', 'Post Restored');
    }

    // Display archived artworks
    public function archived()
    {
        $new = new Artworks();
        $d_artworks = $new->getArchivedArtworks();
        return view('artworks.archived')->with('artworks', $d_artworks);
    }
}
