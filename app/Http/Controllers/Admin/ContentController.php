<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Keyword;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->route = "contents";
        $this->path = "admin.contents";
    }

    public function index(Request $request)
    {
        $categories = Content::latest();

        if (\request()->filled('title'))
            $categories->where('title','like', "%$request->title%");

        $categories = $categories->get();

        return view("{$this->path}.home", ['items' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['keywords'] = Keyword::all();
        return view("{$this->path}.create")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $data = $request->validated() ;
        $data['user_id'] = auth()->id();
        $data['from_admin'] = 1;

        Content::create($data);
        return redirect()->back()->with('status', __('cp.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $Content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $Content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $Content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $Content)
    {
        $data['categories'] = Category::all();
        $data['keywords'] = Keyword::all();
        $data['item'] =$Content;
        return view("{$this->path}.edit")->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $Content
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, Content $Content)
    {
        $data = $request->validated() ;
        $data['user_id'] = auth()->id();
        $data['from_admin'] = 1;
        $Content->update($data);
        return redirect()->back()->with('status', __('cp.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $Content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $Content)
    {
        $Content->delete();
        return response()->json(['status' => true, 'message' => 'success']);
    }
}
