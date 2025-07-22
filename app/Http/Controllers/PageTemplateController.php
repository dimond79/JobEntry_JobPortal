<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageTemplateController extends Controller
{
    public function index($slug)
    {

        $page_content = Page::where('slug', $slug)->first();
        // dd($page_content);

        return view('frontend.pages.page-template', compact('page_content'));
    }
}
