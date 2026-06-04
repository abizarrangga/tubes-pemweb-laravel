<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index');
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function edit($id)
    {
        return view('admin.event.edit');
    }
}