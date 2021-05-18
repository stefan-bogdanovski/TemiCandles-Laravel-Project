<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends MainController
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('pages.error', $this->data);
    }
}
