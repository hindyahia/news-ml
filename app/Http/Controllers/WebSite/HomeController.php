<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $data['posts'] = Content::paginate();
        return view('blog.layouts.index')->with($data);
    }

    public function single_post($id)
    {

        $data['post'] = Content::find($id);
        $data['title'] = $data['post']->title;
        return view('blog.pages.single_post')->with($data);
    }

    public function category($id)
    {

        $data['tagname'] = Category::find($id);
        $data['posts'] = Content::where('category_id', $id)->paginate();
//       $data['title'] = $data['post']->title;
        return view('blog.pages.post')->with($data);
    }

    public function search()
    {
        $data['posts'] = Content::where('title', 'like', '%' . request('search') . '%')->latest()->paginate();
        return view('blog.pages.search')->with($data);
    }
}
