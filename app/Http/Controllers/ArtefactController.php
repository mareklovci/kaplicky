<?php

namespace App\Http\Controllers;

use App\Artefact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtefactController extends Controller
{
    public function default()
    {
        $artefacts = DB::table('artefacts')->get();

        return view('artefact.default', ['artefacts' => $artefacts]);
    }
}
