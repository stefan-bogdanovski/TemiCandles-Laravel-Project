<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User_Role;
use http\Client\Curl\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User as UserAlias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrontendController extends MainController
{
       protected const user_role_id = 2;
       protected const user_is_logged_in = 1;
       protected const user_is_not_logged_in = 0;

    public function __construct()
    {
        parent::__construct();
    }
    public function login(Request $request)
       {
           $email = $request->input('email');
           $pw = md5($request->input('password'));
           try
           {
               $user = UserAlias::with('roles')->where('email', '=', $email)->where('password', '=', $pw)
                   ->where("deleted_at", null)->first();

               if($user != null)
               {
                   $user->logged_in = self::user_is_logged_in;
                   $user->save();
                   session()->put('user', $user);
               }
               else
               {
                   session()->put('error_log_in', "Nesipravan email ili lozinka.");
               }
               return redirect()->route('home');
           }
           catch (\Exception $ex)
           {
               Log::info($ex->getMessage());
               return redirect()->route('error');
           }

       }
       public function register(RegisterRequest $request)
       {
            $name = $request->input("name");
            $lastName = $request->input("lastName");
            $email = $request->input("email");
            $pw = md5($request->input("password"));
           try {
                $user = new UserAlias();

                $user->name = $name;
                $user->lastname = $lastName;
                $user->email = $email;
                $user->password = $pw;
                $user->logged_in = 1;
                $user->save();

                $lastID = UserAlias::max('id');

                $user_role = new User_Role();
                $user_role->user_id = $lastID;
                $user_role->role_id = self::user_role_id;
                $user_role->save();

                $user = UserAlias::with('roles')->where('id', '=', $lastID)->first();
                session()->put('user', $user);
                return redirect()->route('home');
           }
           catch (\Exception $ex)
           {
               Log::error($ex->getMessage());
               return redirect()->route('error');
           }
       }
       public function logout()
       {
           try{
               $userID = session()->get('user')->id;
               $userToLogOut = UserAlias::find($userID);
               $userToLogOut->logged_in = self::user_is_not_logged_in;
               $userToLogOut->save();
               session()->remove('user');
               return redirect()->route('home');
           }
           catch (\Exception $ex)
           {
               Log::info($ex->getMessage());
               return redirect()->route('error');
           }

       }
       public function proba(Request $request)
       {
           if(!empty($request->input('maxPrice')))
           {
               return [1,2,3];
           }
           $products = DB::table('products')
               ->join('products_notes', 'products.id', '=', 'products_notes.product_id')
               ->join('notes', 'products_notes.note_id', '=', 'notes.id')
               ->select('products.name as pname', 'notes.name as nname')->where('products_notes.deleted_at', null)->get();
           dd($products[0]->pname);
       }
}
