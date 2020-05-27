<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Image;
use Illuminate\View\View;
use App\Artefact;

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
            $artefacts = Artefact::withCount('users')->orderByDesc('users_count')->get()->take(10);
            foreach($artefacts as $item)
            {
                $id = $item->id;
                $item['likes'] = Artefact::find($id)->users()->count();
                $item['favourite'] = is_null(User::find(Auth::id())->likesArtefacts()->find($id)) ? false : true;
            }

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


}
