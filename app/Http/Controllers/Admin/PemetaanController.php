<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PemetaanController extends Controller
{
    public function index()
    {
        return view('admin.pemetaan.index');
    }
}
