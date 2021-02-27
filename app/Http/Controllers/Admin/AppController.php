<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin){
            $data['keywords_count']  = Keyword::count();
            $data['category_count']  = Category::count();
            $data['users_count']  = User::where('is_admin',false)->count();
            $data['articles_count']  = Content::where('from_admin',false)->count();

        }else
        $data['keywords']  = Keyword::where(['status'=>3,'user_id'=>auth()->id()])->get();
        return view('admin.home.home')->with($data);
    }

    public function changeStatus($model, Request $request)
    {

        $models = [
            'users' => 'App\Models\User',
            'admins' => 'App\Models\User',
            'categories' => 'App\Models\Category',
            'blocked-keywords' => 'App\Models\BlockedKeyword',
            'contents' => 'App\Models\Content',
//            'favorites' => 'App\Models\Favorite',
            'keywords' => 'App\Models\Keyword',
        ];


        $role = $models[$model];

        if ($role != "") {
            if ($request->action == 'delete') {
                $role::query()->whereIn('id', $request->IDsArray)->delete();
            } else {
                if ($request->action) {
                    $role::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->action]);
                }
            }

            return $request->action;
        }
        return false;


    }
}
