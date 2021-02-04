<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('admin.home.home');
    }

    public function changeStatus($model, Request $request)
    {

        $models = [
            'users' => 'App\Models\User',
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
