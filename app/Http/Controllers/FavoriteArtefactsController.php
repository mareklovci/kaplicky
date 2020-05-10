<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Artefact;
use App\Http\Controllers\Image;
use Illuminate\View\View;

class FavoriteArtefactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if(Auth::check())
        {
            $id = Auth::id();
            $artefacts = User::find($id)->likesArtefacts()->get();
            foreach($artefacts as $item)
            {
                $item['likes'] = Artefact::find($item->id)->users()->count();
            }

            $data = array(
                'title' => 'Favorite artefacts',
                'user' => $id,
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
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $artefacts = User::find($id)->likesArtefacts()->get();
        foreach($artefacts as $item)
        {
            $item['likes'] = Artefact::find($item->id)->users()->count();
        }

        $data = array(
            'title' => 'Favorite artefacts',
            'id' => $id,
            'user' => User::find($id),
            'userId' => Auth::id(),
            'artefacts' => $artefacts
        );
        return view('favartefacts.index') -> with($data);
    }

}
