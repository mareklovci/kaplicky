<?php

namespace App\Http\Controllers;

use App\ArtefactUser;
use App\User;
use Illuminate\Http\Request;
use App\Metadata;
use App\Artefact;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    const ORDER_COLUMN = 'page';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Welcome to the MERLOT page',
        );
        //return view('index', compact('title'));
        return view('index') -> with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        if (is_null(Artefact::find($id)))
        {
            return view('detail.index', ['metadata' => []]);
        }

        $metadata = Artefact::find($id)->metadata()->orderBy(self::ORDER_COLUMN)->get();
        foreach($metadata as $item)
        {
            $item['favourite'] = is_null(User::find(Auth::id())->likesMetadata()->find($item->id)) ? false : true;
        }

        return view('detail.index', ['metadata' => $metadata]);
    }

    /**
     * Likes metadata given by its id.
     *
     * @param $id int id of metadata
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like($id)
    {
        $user = User::find(Auth::id());
        $metadata = Metadata::find($id);

        $user->likesMetadata()->attach($metadata);

        return back()->withInput();
    }

    /**
     * Unlikes metadata given by its id.
     *
     * @param $id int id of metadata
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike($id)
    {
        $user = User::find(Auth::id());
        $metadata = Metadata::find($id);

        $user->likesMetadata()->detach($metadata);

        return back()->withInput();
    }
}
