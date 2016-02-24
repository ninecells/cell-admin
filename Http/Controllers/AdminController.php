<?php

namespace NineCells\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function GET_index()
    {
        return view('ncells::admin.pages.dashboard');
    }
}
