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

        return view('frontend.pages.page-template', [
            'page_content' => $page_content,
            'meta_title' => $page_content->meta_title,
            'meta_description' => $page_content->meta_description,
        ]);
    }
}
