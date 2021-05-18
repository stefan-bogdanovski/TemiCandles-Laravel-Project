<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\EditRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = 'roles';
        $this->data['title'] = "Uloge";
        $this->data['attributes'] = ['Id', 'Naziv'];

    }
    public function index()
    {
        $this->data['data'] = Role::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }
    public function create()
    {
        return view('admin.createForms.role_add', $this->data);
    }
    public function store(AddRoleRequest $request)
    {
        $role_name = $request->input('role');
        try {
            Role::create([
                "name" => $role_name
            ]);
            session()->put('success',"Uspešno dodavanje uloge!");
            return response()->redirectToRoute('roles.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno dodavanje uloge!");
            return redirect()->back();
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        try {
            $this->data['role'] = Role::find($id);
            if($this->data['role'] == null)
            {
                return response()->redirectToRoute('roles.index');
            }
            return view('admin.editForms.role_edit', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function update(EditRoleRequest $request, $id)
    {
        $role = $request->input('role');
        try {
            Role::where('id', $id)->update([
                'name' => $role,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->put('success',"Uspešna izmena uloge!");
            return response()->redirectToRoute('roles.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešna izmena naziva uloge!");
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try {
            Role::where(["id" => $id])
                ->update(['deleted_at' => date('Y-m-d H:i:s')
                ]);
            session()->put('success',"Uspešno brisanje uloge!");
            return response()->redirectToRoute('roles.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno brisanje uloge!");
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try {
            $this->data['deleted'] = Role::where('deleted_at', '<>', null)->get();
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
        try {
            Role::where("id", $id)->update(["deleted_at" => null]);
            session()->put('success',"Uspešno vraćanje uloge!");
            return response()->redirectToRoute('roles.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno vraćanje uloge!");
            return redirect()->back();
        }
    }
}
