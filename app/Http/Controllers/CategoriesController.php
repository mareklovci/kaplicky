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

    public function calculateClusters($categoriesCount)
    {
        if(isset($categoriesCount))
        {
            $min = PHP_INT_MAX;
            $max = PHP_INT_MIN;
            foreach($categoriesCount as $category)
            {
                $c = count($category);
                if($c < $min)
                {
                    $min = $c;
                }

                if($c > $max)
                {
                    $max = $c;
                }
            }
            $center = $min + (($max - $min)/2);
            return array($min, $center, $max);
        }
        else
        {
            return null;
        }
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

            $categoryNames = Category::all();
            $countCategory = count($categoryNames);
            $categories = array();
            for($i = 1; $i <= $countCategory;$i++)
            {
                array_push($categories, Category::find($i)->get());
            }
            $clusters = $this->calculateClusters($categories);

            $categorySizes = array();
            if(isset($clusters))
            {
                foreach($categories as $category)
                {
                    $c = count($category);
                    $type1 = abs($clusters['0'] - $c);
                    $type2 = abs($clusters['1'] - $c);
                    $type3 = abs($clusters['2'] - $c);

                    if($type1 <= $type2 && $type1 <= $type3)
                    {
                        array_push($categorySizes, 1);
                    }
                    else if($type2 <= $type1 && $type2 <= $type3)
                    {
                        array_push($categorySizes, 2);
                    }
                    else
                    {
                        array_push($categorySizes, 3);
                    }
                }
            }

            $data = array(
                'title' => 'Categories',
                'user' => User::find($userId),
                'count' => $countCategory,
                'categories' => $categories,
                'categorySizes' => $categorySizes,
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
