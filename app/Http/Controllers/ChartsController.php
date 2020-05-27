<?php

namespace App\Http\Controllers;

use App\User;
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
            //$user_likes = User::find(Auth::id())->likesArtefacts();
            foreach($artefacts as $item)
            {
                $id = $item->id;
                $item['likes'] = Artefact::find($id)->users()->count();
                $item['favourite'] = is_null(User::find(Auth::id())->likesArtefacts()->find($id)) ? false : true;
            }
            //$artefacts->keyBy('id');
            /*$selected = [];
            for($i=0;$i<10;$i++){
                $max = $artefacts->where('likes', $artefacts->max('likes'));
                $selected[$i] = $max->first();
                $artefacts->forget($max->keys()->first());
            }
            $artefacts=$selected;*/
            $artefacts=$artefacts->sortByDesc('likes')->take(10);

            $data = array(
                'title' => 'Charts',
                'artefacts' => $artefacts
            );
            return view('charts.index') -> with($data);
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
    /*public function show()
    {
        $artefacts = Artefact::all();
        //$user_likes = User::find(Auth::id())->likesArtefacts();
        foreach($artefacts as $item)
        {
            $id = $item->id;
            $item['likes'] = Artefact::find($id)->users()->count();
            $item['favourite'] = is_null(User::find(Auth::id())->likesArtefacts()->find($id)) ? false : true;
        }
        $artefacts=$artefacts->sortByDesc('likes');

        $data = array(
            'title' => 'Charts',
            'artefacts' => $artefacts
        );
        return view('charts.index') -> with($data);
    }*/

}
