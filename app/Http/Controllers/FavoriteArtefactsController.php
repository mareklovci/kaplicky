<?php

namespace App\Http\Controllers;

use App\ArtefactUser;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Artefact;
use App\Http\Controllers\Image;

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
            $userId = Auth::user()->id;
            $list = ArtefactUser::where('user_id', $userId)->get();
            $finalData = array();
            foreach($list as $item)
            {
                $tmp = Artefact::where('id', $item->artefact_id)->get();
                $tmp['likes'] = Artefact::find($item->artefact_id)->users()->count();
                array_push($finalData, $tmp);
            }

            $data = array(
                'title' => 'Favorite artefacts',
                'user' => User::find($userId),
                'artefacts' => $finalData
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
        $list = ArtefactUser::where('user_id', $id)->get();
        $finalData = array();
        foreach($list as $item)
        {
            $tmp = Artefact::where('id', $item->artefact_id)->get();
            $tmp['likes'] = Artefact::find($item->artefact_id)->users()->count();
            array_push($finalData, $tmp);
        }

        $data = array(
            'title' => 'Favorite artefacts',
            'id' => $id,
            'user' => User::find($id),
            'userId' => Auth::user()->id,
            'artefacts' => $finalData
        );
        return view('favartefacts.index') -> with($data);
    }

}
