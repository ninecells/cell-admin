<?php

namespace NineCells\Admin\Http\Controllers;

use Gate;
use Redirect;

class AdminController extends Controller
{
    public function GET_index()
    {
        if (!Gate::allows('admin')) {
            return Redirect::to('/');
        }

        return view('ncells::admin.pages.dashboard');
    }
}
