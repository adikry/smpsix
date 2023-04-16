<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artikel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'contentTitle' => 'Dashboard'
        ]);
    }
}
