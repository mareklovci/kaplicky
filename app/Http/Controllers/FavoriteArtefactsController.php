<?php

namespace App\Http\Controllers;

use App\ArtefactUser;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Artefact;

class FavoriteArtefactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $artefacts = User::find(Auth::id())->likesArtefacts()->get();

            $data = array(
                'title' => 'Favorite artefacts',
                'user' => Auth::user(),
                'artefacts' => $artefacts
            );
            return view('favartefacts.index') -> with($data);
        }
        else
        {
            $data = array(
                'title' => 'Welcome to the MERLOT page',
            );
            //return view('index', compact('title'));
            return view('pages.index') -> with($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artefacts = [];
        if (!is_null(User::find($id)))
        {
            $artefacts = User::find($id)->likesArtefacts()->get();
        }

        $data = array(
            'title' => 'Favorite artefacts',
            'id' => $id,
            'user' => Auth::user(),
            'userId' => Auth::id(),
            'artefacts' => $artefacts
        );
        return view('favartefacts.index') -> with($data);
    }

}
