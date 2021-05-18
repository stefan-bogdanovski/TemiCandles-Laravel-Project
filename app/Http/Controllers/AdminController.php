<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends MainAdminController
{
    protected const currentlyLoggedIn = 1;
    public function index()
    {
        try
        {

            $this->data['data'] = User::all()->where('logged_in', '=', self::currentlyLoggedIn);
            $this->data['title'] = "Trenutno ulogovani korisnici";
            $this->data['entity'] = "users";
            $this->data['edit'] = false;
            $this->data['attributes'] = ['Id', 'Ime', 'Prezime', 'Email'];
            return view('admin.genericView', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
        }
    }
}
