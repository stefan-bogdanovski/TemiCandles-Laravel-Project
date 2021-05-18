<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\User_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = "users";
        $this->data['attributes'] = ["Id", "Ime", "Prezime", "Email adresa"];
        $this->data['title'] = "Korisnici";

    }
    public function index()
    {
        $this->data['data'] = User::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }

    public function create()
    {
        //prikaz forme za dodavanje novog zapisa korisnika.
        $this->data['roles'] = Role::all()->where("deleted_at", null);
        return view('admin.createforms.user_add', $this->data);
    }

    public function store(RegisterRequest $request)
    {
        try {
           $user = User::create([

                    'name' => $request->input('name'),
                    'lastname' => $request->input('lastName'),
                    'email' => $request->input('email'),
                    'password' => md5($request->input("password")),
                    'logged_in' => 0
                ]
            );
            DB::table('users_roles')->insert(
                [
                    'user_id' => $user->id,
                    'role_id' => $request->input('role')
                ]
            );
            session()->put('success',"Uspešno dodavanje korisnika!");
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            session()->put('error',"Neuspešno dodavanje korisnika!");
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        //prikazivanje jednog zapisa
    }


    public function edit($id)
    {
        //prikaz forme za izmenu zapisa
        try {
            $this->data['userToEdit'] = User::find($id);
            $this->data['userRoles'] = $this->data['userToEdit']->roles;
            $this->data['roles'] = Role::all()->where("deleted_at", null);
            return view('admin.editforms.user_edit', $this->data);
        } catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastName');
            $user->email = $request->input('email');
              User_Role::where('user_id', $id)->delete();
              foreach($request->input('roles') as $role)
              {
                User_Role::create(
                    [
                        "user_id" => $id,
                        "role_id" => $role
                    ]
                );
              }
            $user->save();
            session()->put('success', "Uspešno editovanje korisnika!");
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            session()->put('error', "Neuspešno editovanje korisnika!");
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            User_Role::where('user_id', '=', $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            User::where("id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            session()->put('success', 'Uspešno brisanje korisnika!');
            return $this->index();
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error', 'Neuspešno brisanje korisnika!');
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try {
            $this->data['deleted'] = User::where('deleted_at', '<>', null)->get();
            array_push($this->data['attributes'], 'Datum brisanja');
            array_push($this->data['attributes'], 'Povrati');
            return view('admin.restoreForms.restore', $this->data);
            }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
        }
    }
    public function restoreDeleted($id)
    {
//        try {
//            User::where("id", $id)->update(["deleted_at" => null]);
//            session()->put('success',"Uspešno vraćanje korisnika!");
//            return response()->redirectToRoute('users.index');
//        }
//        catch (\Exception $ex)
//        {
//            Log::info($ex->getMessage());
//            session()->put('success',"Neuspešno vraćanje korisnika!");
//            return redirect()->back();
//        }
    }
}
