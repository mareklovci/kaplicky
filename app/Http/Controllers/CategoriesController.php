<?php

namespace App\Http\Controllers;

use App\ArtefactCategory;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\User;

class CategoriesController extends Controller
{
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
        if(isset(Auth::user()->id))
        {
            $userId = Auth::user()->id;

            $categoryNames = Category::orderBy('id')->get();
            $countCategory = count($categoryNames);

            $data = array(
                'title' => 'Categories',
                'user' => User::find($userId),
                'count' => $countCategory,
                'categoryNames' => $categoryNames
            );
            return view('categories.index') -> with($data);
        }
        else
        {
            $data = array(
                'title' => 'Welcome to the MERLOT page',
            );
            return view('pages.index') -> with($data);
        }
    }
}
