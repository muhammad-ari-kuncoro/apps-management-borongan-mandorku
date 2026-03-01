<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['titleSidebar'] = 'Dashboard';
        $data['titlePage'] = 'Dashboard Mandor';
        return view('pages.dashboard.index',$data);
    }
}
