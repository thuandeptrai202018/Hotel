<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function viewTest()
    {
        return view('welcome');
    }

    public function index()
    {
        return view('admin.share.master_page');
    }
}
