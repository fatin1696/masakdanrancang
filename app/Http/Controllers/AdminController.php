<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        return view('admin');

    }
}
