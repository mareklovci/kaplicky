<?php

namespace App\Http\Controllers;

use App\Artefact;
use App\ArtefactCategory;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArtefactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns view of all artefacts.
     *
     * @return Factory|View
     */
    public function default()
    {
        $artefacts = Artefact::all();

        return view('artefact.default', ['artefacts' => $artefacts]);
    }

    /**
     * Returns view of artefacts related to the chosen category
     *
     * @param $id id of the category
     * @return Factory|View
     */
    public function showCategory($id)
    {
        $categoryArtefacts = ArtefactCategory::where('category_id', $id)->get();
        if(count($categoryArtefacts) > 0)
        {
            $artefacts = array();
            foreach($categoryArtefacts as $ar)
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
     * @return Factory|View
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
     * @return RedirectResponse
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
     * @return RedirectResponse
     */
    public function unlike($id)
    {
        $user = User::find(Auth::id());
        $artefact = Artefact::find($id);

        $user->likesArtefacts()->detach($artefact);

        return back()->withInput();
    }
}
