<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dashboard;

class DashboardController extends Controller
{
    public function encabih()
    {
        //$dashboard = dashboard::all();
        return view('dashboards.encabih.index');
    }
    public function encovi()
    {
        //$dashboard = dashboard::all();
        return view('dashboards.encovi.index');
    }
}
