<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.mill');
    }

    public function create()
    {
        return view( 'admin.create');
    }
}
