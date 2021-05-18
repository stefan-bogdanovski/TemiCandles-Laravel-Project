<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddLinkRequest;
use App\Models\Menu;
use App\Models\Menu_Role;
use App\Models\Menu_Type;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminLinkController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = "links";
        $this->data['attributes'] = ['Id', 'Putanja', 'Ime', 'Prioritet'];
        $this->data['title'] = "Linkovi";
    }
    public function index()
    {
        $this->data['data'] = Menu::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }
    public function create()
    {
        try {
            $this->data['menutype'] = Menu_Type::where('deleted_at', null)->get();
            $this->data['roles'] = Role::where('deleted_at', null)->get();
            return view('admin.createForms.link_add', $this->data);
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }

    public function store(AddLinkRequest $request)
    {
        $category_id = $request->input('category');
        $name = $request->input('link');
        $path = $request->input('linkpath');
        $priority = $request->input('linkpriority');
        $roles = $request->input('roles');
        try {
            $id = DB::table('menus')->insertGetId([
                    "route" => $path,
                    "name" => $name,
                    "order" => $priority,
                    "menu_type_id" => $category_id,
                ]);
            foreach($roles as $one)
            {
                Menu_Role::create([
                    'menu_id' => $id,
                    'role_id' => $one
                ]);
            }
                session()->put('success',"Uspešno dodavanje linka!");
                return response()->redirectToRoute('links.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno dodavanje linka!");
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
            $this->data['menutype'] = Menu_Type::all();
            $this->data['roles'] = Role::all();
            $this->data['link'] = Menu::with('roles', 'type')
            ->where('id', $id)->first();
            return view('admin.editForms.link_edit', $this->data);
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $link = Menu::find($id);
            $link->name = $request->input('link');
            $link->route = $request->input('linkpath');
            $link->order = $request->input('linkpriority');
            $link->updated_at = date('Y-m-d H:i:s');
            Menu_Role::where('menu_id', $id)->delete();
            foreach($request->input('roles') as $role)
            {
                Menu_Role::create(
                    [
                        "user_id" => $id,
                        "role_id" => $role
                    ]
                );
            }
            $link->save();
            session()->put('success', "Uspešna izmena linka!");
            return response()->redirectToRoute('links.index');
        }
        catch(\Exception $ex)
        {
            session()->put('error', "Neuspešna izmena linka!");
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Menu_Role::where('menu_id', '=', $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            Menu::where("id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            session()->put('success', 'Uspešno brisanje linka!');
            return response()->redirectToRoute('links.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error', 'Neuspešno brisanje linka!');
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try {
            $this->data['deleted'] = Menu::where('deleted_at', '<>', null)->get();
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
            Menu::where("id", $id)->update(["deleted_at" => null]);
            Menu_Role::where('menu_id', $id)->update(["deleted_at" => null]);
            session()->put('success',"Uspešno vraćanje linka!");
            return response()->redirectToRoute('links.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno vraćanje linka!");
            return redirect()->back();
        }
    }
}
