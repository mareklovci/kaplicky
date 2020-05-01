<?php

namespace App\Http\Controllers;

use App\Metadata;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteMetadataController extends Controller
{
    const ORDER_COLUMN = 'page';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $metadata = User::find(Auth::id())->likesMetadata()->orderBy(self::ORDER_COLUMN)->get();
        foreach($metadata as $item)
        {
            $item['artefact'] = Metadata::find($item->id)->artefact()->first();
        }

        return view('favmetadata.index', ['metadata' => $metadata]);
    }

}
