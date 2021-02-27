<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\KeywordRequest;
use App\Models\BlockedKeyword;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Http\Request;

class BlockedKeywordController extends Controller
{
    public function __construct()
    {
        $this->route = "blocked-keywords";
        $this->path = "admin.blocked-keywords";
    }

    public function index(Request $request)
    {
        $items = BlockedKeyword::latest();


            if (\request()->filled('title'))
            $items->where('title','like', "%$request->title%");

        $items = $items->get();

        return view("{$this->path}.home", ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->path}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeywordRequest $request)
    {
        BlockedKeyword::create($request->validated() );
        return redirect()->back()->with('status', __('cp.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keyword $keyword
     * @return \Illuminate\Http\Response
     */
    public function show(BlockedKeyword $keyword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keyword $keyword
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keyword = BlockedKeyword::find($id);
        return view("{$this->path}.edit")->with([
            'item' => $keyword
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keyword $keyword
     * @return \Illuminate\Http\Response
     */
    public function update(KeywordRequest $request, $id)
    {
        $keyword = BlockedKeyword::find($id);
        $keyword->update($request->validated());
        return redirect()->back()->with('status', __('cp.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keyword  $keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockedKeyword   $keyword)
    {
        $keyword->delete();
        return response()->json(['status' => true, 'message' => 'success']);
    }
}
