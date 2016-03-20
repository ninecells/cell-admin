<?php

namespace NineCells\Admin\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorize('admin');
    }

    public function GET_index()
    {
        return view('ncells::admin.pages.dashboard');
    }
}
