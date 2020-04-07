<?php

namespace App\Http\Controllers;

use App\ArtefactUser;
use Illuminate\Http\Request;
use App\Metadata;
use App\Artefact;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Welcome to the MERLOT page',
        );
        //return view('index', compact('title'));
        return view('index') -> with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'title' => 'Title of the BOOK',
            'id' => $id,
            'arrArtefact' => Artefact::find($id),
            'likes' => ArtefactUser::where('artefact_id', $id)->get(),
            'metadata' => Metadata::where('artefact_id', $id)->get()
        );
        return view('detail.index') -> with($data);
    }

}
