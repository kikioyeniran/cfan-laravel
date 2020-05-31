<?php

namespace App\Http\Controllers;

use App\company_details;
use Illuminate\Http\Request;

class CompDetailsController extends Controller
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
        return view('comp_details.create');
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
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fb_link' => 'required',
            'ig_link' => 'required',
            'tw_link' => 'required',
            'yt_link' => 'required',
            'comp_img' => 'image|nullable|max:2999',
            'mission' => 'required'
        ]);
        //Handle file up0loads
        if ($request->hasFile('comp_img')) {
            //Get file name with extension
            $filenameWithExt = $request->file('comp_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Join if there's spave in filename
            $new_arr = explode(" ", $filename);
            if ($new_arr) {
                $filename == join("-", $new_arr);
            }
            // Get just ext
            $extension = $request->file('comp_img')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
            $path = $request->file('comp_img')->storeAs('public/pictures', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $comp = new company_details;
        $comp->address = $request->input('address');
        $comp->email = $request->input('email');
        $comp->phone_numbers = $request->input('phone');
        $comp->fb_link = $request->input('fb_link');
        $comp->ig_link = $request->input('ig_link');
        $comp->tw_link = $request->input('tw_link');
        $comp->yt_link = $request->input('yt_link');
        $comp->mission = $request->input('mission');
        if ($request->hasFile('comp_img')) {
            $comp->picture = $fileNameToStore;
        }
        $comp->save();

        $cid = $comp->id;
        $link = "/comp-details" . "/" . $cid . "/edit";
        return redirect($link)->with('success', 'Post created');
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
        $comp = company_details::find($id);
        return view('comp_details.edit')->with('post', $comp);
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
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fb_link' => 'required',
            'ig_link' => 'required',
            'tw_link' => 'required',
            'yt_link' => 'required',
            'comp_img' => 'image|nullable|max:2999',
            'mission' => 'required'
        ]);
        //Handle file up0loads
        if ($request->hasFile('comp_img')) {
            //Get file name with extension
            $filenameWithExt = $request->file('comp_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Join if there's spave in filename
            $new_arr = explode(" ", $filename);
            if ($new_arr) {
                $filename == join("-", $new_arr);
            }
            // Get just ext
            $extension = $request->file('comp_img')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
            $path = $request->file('comp_img')->storeAs('public/pictures', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $comp = company_details::find($id);
        $comp->address = $request->input('address');
        $comp->email = $request->input('email');
        $comp->phone_numbers = $request->input('phone');
        $comp->fb_link = $request->input('fb_link');
        $comp->ig_link = $request->input('ig_link');
        $comp->tw_link = $request->input('tw_link');
        $comp->yt_link = $request->input('yt_link');
        $comp->mission = $request->input('mission');
        if ($request->hasFile('comp_img')) {
            $comp->picture = $fileNameToStore;
        }
        $comp->save();
        $cid = $comp->id;
        $link = "/comp-details" . "/" . $cid . "/edit";
        return redirect($link)->with('success', 'Post created');
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
}
