<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends MainController
{

    public function __construct(Request $request)
    {
        parent::__construct();
    }

    public function index()
    {
        return view('pages.index', $this->data);
    }
    public function cart()
    {
        return view('pages.cart', $this->data);
    }
    public function contact()
    {
        return view('pages.contact', $this->data);
    }
}
