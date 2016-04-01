<?php

namespace NineCells\Admin\Http\Controllers;

use Gate;
use Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Gate::allows('admin')) {
            Redirect::to('/')->send();
        }
    }

    public function GET_index()
    {
        return view('ncells::admin.pages.dashboard');
    }
}
