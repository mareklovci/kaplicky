<?php

namespace App\Http\Controllers;

use App\Artefact;
use App\ArtefactCategory;
use App\Category;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArtefactController extends Controller
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
     * Returns view of all artefacts.
     *
     * @return Factory|View
     */
    public function default()
    {
        $artefacts = Artefact::simplePaginate(1);
        $artefacts = $this->prepData($artefacts);
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
        $artefacts = Category::find($id)->artefacts()->simplePaginate(1);
        $artefacts = $this->prepData($artefacts);
        return view('artefact.default', ['artefacts' => $artefacts]);
    }

    /**
     * Returns view of artefacts related to the chosen categories
     *
     * @param $id string with categories ids
     * @return Factory|View
     */
    public function showCategories($id)
    {
        //Parsing text for individual ids of categories
        $textWithIds  = $id;
        $pieces = explode(",", $textWithIds);
        $arrStrToInt = array();
        for($i = 0;$i < count($pieces); $i++)
        {
            if($pieces[$i] == null || !strcmp($pieces[$i], ""))
            {
                continue;
            }

            array_push($arrStrToInt, (int)$pieces[$i]);
        }

        //Creating array of all artefacts ids
        $arrArtIds = array();
        foreach($arrStrToInt as $cat)
        {
            $tmpArtefacts = Category::find($cat)->artefacts()->get();
            foreach($tmpArtefacts as $art)
            {
                array_push($arrArtIds, $art->id);
            }
        }

        $artefacts = Artefact::whereIn('id', $arrArtIds)->simplePaginate(1);
        $artefacts = $this->prepData($artefacts);
        return view('artefact.default', ['artefacts' => $artefacts]);
    }

    /**
     * Returns view of single artefact given by its id.
     *
     * @param $id int id of the artefact
     * @return Factory|View
     */
    public function view($id)
    {
        $artefact = Artefact::where('id', $id)->simplePaginate(1);
        $artefact = $this->prepData($artefact);
        //return view('artefact.view', ['artefact' => $artefact]);
        return view('artefact.default', ['artefacts' => $artefact]);
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

    /**
     * Returns artefact given by its id.
     *
     * @param $id int id of artefact
     * @return RedirectResponse
     */
    /*public function view($id)
    {
        //$user = User::find(Auth::id());
        //$artefact = Artefact::find($id);

        $artefacts = Artefact::withCount('users')->orderByDesc('users_count')->get()->take(10);


            $currentPage = -1; // You can set this to any page you want to paginate to

            for($i=0;$i<10;$i++){
                if($artefacts[$i]->id==$id) $currentPage = $i+1;
            }
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });



        $artefacts = Artefact::withCount('users')->orderByDesc('users_count')->limit(10)->paginate(1);

        $artefacts = ArtefactController::prepData($artefacts);
        return view('artefact.default', ['artefacts' => $artefacts]);
        /*foreach($artefacts as $item)
        {
            $id = $item->id;
            $item['likes'] = Artefact::find($id)->users()->count();
            $item['favourite'] = is_null(User::find(Auth::id())->likesArtefacts()->find($id)) ? false : true;
        }*/


        //return back()->withInput();
    /*}*/
}
