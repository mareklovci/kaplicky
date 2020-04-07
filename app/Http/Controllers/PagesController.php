<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function  index()
    {
        $title = 'Welcome to the MERLOT page';
        //return view('index', compact('title'));
        return view('index') -> with('title', $title);
    }

    public function info()
    {
        $title = 'Info about MERLOT';
        return view('pages.info') -> with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web design', 'Programming', 'SEO']
        );
        return view('pages.services') -> with($data);
    }
}
