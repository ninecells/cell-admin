<?php

namespace NineCells\Admin\Http\Controllers;

class AdminController extends Controller
{
    public function GET_index()
    {
        return view('ncells::admin.pages.dashboard');
    }
}
