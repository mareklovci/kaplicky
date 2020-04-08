<?php

namespace App\Http\Controllers;

use App\Artefact;
use Illuminate\Http\Request;
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
     * Returns view of single artefact given by its id.
     *
     * @param $id int id of the artefact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $artefact = Artefact::find($id);

        return view('artefact.view', ['artefact' => $artefact]);
    }
}
