<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminTypeController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = "types";
        $this->data['attributes'] = ['Id', 'Name'];
        $this->data['title'] = "Tipovi";
    }
    public function index()
    {
        $this->data['data'] = Type::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }
    public function create()
    {
        return view('admin.createForms.type_add', $this->data);
    }
    public function store(AddTypeRequest $request)
    {
        try {
            Type::create([
                'type' => $request->input('type')
            ]);
            session()->put('success',"Uspešno dodavanje tipa!");
            return response()->redirectToRoute('types.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno dodavanje tipa!");
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
            $this->data['type'] = Type::find($id);
            if($this->data['type'] == null)
            {
                return response()->redirectToRoute('sizes.index');
            }
            return view('admin.editForms.type_edit', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {
        try {
            Type::where('id', $id)->update([
                'type' => $request->input('type'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->put('success',"Uspešna izmena tipa!");
            return response()->redirectToRoute('types.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešna izmena tipa!");
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try {
            Type::where(["id" => $id])
                ->update(['deleted_at' => date('Y-m-d H:i:s')
                ]);
            session()->put('success',"Uspešno brisanje tipa!");
            return response()->redirectToRoute('types.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno brisanje tipa!");
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try {
            $this->data['deleted'] = Type::where('deleted_at', '<>', null)->get();
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
            Type::where("id", $id)->update(["deleted_at" => null]);
            session()->put('success',"Uspešno vraćanje tipa!");
            return response()->redirectToRoute('types.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno vraćanje tipa!");
            return redirect()->back();
        }
    }
}
