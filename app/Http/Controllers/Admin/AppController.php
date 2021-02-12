<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $data['keywords']  = Keyword::where(['status'=>3,'user_id'=>auth()->id()])->get();
        return view('admin.home.home')->with($data);
    }

    public function changeStatus($model, Request $request)
    {

        $models = [
            'users' => 'App\Models\User',
            'admins' => 'App\Models\User',
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
