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
    const ORDER_COLUMN = 'page';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Prepare all necessary data for shown Artefact.
     * These are current count of likes, if it set to
     * a favorites by a logged user and all metadata
     * connected to the artefact.
     *
     * @param       $artefacts  all artefacts
     * @return      mixed       modified artefacts
     */
    public function prepData($artefacts)
    {
        foreach($artefacts as $artefact)
        {
            $artefact['likes'] = Artefact::find($artefact->id)->users()->count();
            $artefact['favourite'] = is_null(User::find(Auth::id())->likesArtefacts()->find($artefact->id)) ? false : true;
            $metadata = Artefact::find($artefact->id)->metadata()->orderBy(self::ORDER_COLUMN)->get();
            foreach ($metadata as $item)
            {
                $item['favourite'] = is_null(User::find(Auth::id())->likesMetadata()->find($item->id)) ? false : true;
            }
            $artefact['metadata'] = $metadata;
        }
        return $artefacts;
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
            $artefacts = User::find($id)->likesArtefacts()->simplePaginate(1);
            $artefacts = $this->prepData($artefacts);
            return view('artefact.default', ['artefacts' => $artefacts]);
        }
        else
        {
            return view('pages.index');
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
        $artefacts = User::find($id)->likesArtefacts()->simplePaginate(1);
        $artefacts = $this->prepData($artefacts);
        return view('artefact.default', ['artefacts' => $artefacts]);
    }

}
