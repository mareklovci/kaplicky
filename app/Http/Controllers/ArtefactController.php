<?php

namespace App\Http\Controllers;

use App\Artefact;
use App\ArtefactCategory;
use App\Category;
use App\Metadata;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtefactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns view of all artefacts.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function default()
    {
        $artefacts = Artefact::all();

        return view('artefact.default', ['artefacts' => $artefacts]);
    }

    /**
     * Returns view of artefacts related to the chosen category
     *
     * @param $id       id of the category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory($id)
    {
        $cateogryArtefacts = ArtefactCategory::where('category_id', $id)->get();
        if(count($cateogryArtefacts) > 0)
        {
            $artefacts = array();
            foreach($cateogryArtefacts as $ar)
            {
                array_push($artefacts, Artefact::where('id', $ar->artefact_id)->get());
            }
            return view('artefact.category', ['artefacts' => $artefacts]);
        }
        else
        {
            return view('artefact.category', ['artefacts' => array()]);
        }
    }

    /**
     * Returns view of single artefact given by its id.
     *
     * @param $id int id of the artefact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $artefact = Artefact::find($id);
        $artefact['likes'] = Artefact::find($id)->users()->count();
        $artefact['favourite'] = is_null(User::find(Auth::id())->likesArtefacts()->find($id)) ? false : true;

        return view('artefact.view', ['artefact' => $artefact]);
    }

    /**
     * Likes artefact given by its id.
     *
     * @param $id int id of metadata
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like($id)
    {
        $user = User::find(Auth::id());
        $artefact = Artefact::find($id);

        $user->likesArtefacts()->attach($artefact);

        return back()->withInput();
    }

    /**
     * Unlikes artefact given by its id.
     *
     * @param $id int id of metadata
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike($id)
    {
        $user = User::find(Auth::id());
        $artefact = Artefact::find($id);

        $user->likesArtefacts()->detach($artefact);

        return back()->withInput();
    }
}
