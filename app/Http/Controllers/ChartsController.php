<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use App\Artefact;
use App\Http\Controllers\Image;
use Illuminate\View\View;

class ChartsController extends Controller
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
            $artefacts = Artefact::all();
            foreach($artefacts as $item)
            {
                $item['likes'] = Artefact::find($item->id)->users()->count();
            }
            $artefacts=$artefacts->sortByDesc('likes');

            $data = array(
                'title' => 'Charts',
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
     * @return Application|Factory|View
     */
    public function show()
    {
        $artefacts = Artefact::all();
        foreach($artefacts as $item)
        {
            $item['likes'] = Artefact::find($item->id)->users()->count();
        }
        $artefacts=$artefacts->sortByDesc('likes');

        $data = array(
            'title' => 'Charts',
            'artefacts' => $artefacts
        );
        return view('charts.index') -> with($data);
    }

}
