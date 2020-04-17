<?php

namespace App\Http\Controllers;

use App\Metadata;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteMetadataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $metadata = User::find(Auth::id())->likesMetadata()->get();

        return view('favmetadata.index', ['metadata' => $metadata]);
    }

}
