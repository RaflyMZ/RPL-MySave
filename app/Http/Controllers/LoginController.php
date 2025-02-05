<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display the finansial page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('login');
    }
}
