<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeywordRequest;
use App\Models\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function __construct()
    {
        $this->route = "keywords";
        $this->path = "admin.keywords";
    }

    public function index(Request $request)
    {
        $keywords = Keyword::latest();

        if (\request()->filled('title'))
            $keywords->where('title','like', "%$request->title%");

        $keywords = $keywords->get();

        return view("{$this->path}.home", ['items' => $keywords]);
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
        $data = $request->validated() ;
        $data['user_id'] = auth()->id()?? 1;
        $data['from_admin'] =1;
        $data['status'] = $request->boolean('status');

        Keyword::create($data);
        return redirect()->back()->with('status', __('cp.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keyword  $Keyword
     * @return \Illuminate\Http\Response
     */
    public function show(Keyword $Keyword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keyword  $Keyword
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyword $Keyword)
    {
        $data['item']= $Keyword;

        return view("{$this->path}.edit")->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keyword  $Keyword
     * @return \Illuminate\Http\Response
     */
    public function update(KeywordRequest $request, Keyword $Keyword)
    {
        $data = $request->validated() ;
        $data['user_id'] = auth()->id()?? 1;
        $data['from_admin'] = 1;
        $data['status'] = $request->boolean('status');

        $Keyword->update($data);
        return redirect()->back()->with('status', __('cp.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keyword  $Keyword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $Keyword)
    {
        $Keyword->delete();
        return response()->json(['status' => true, 'message' => 'success']);
    }
}
