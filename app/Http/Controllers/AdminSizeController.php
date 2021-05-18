<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSizeRequest;
use App\Http\Requests\EditSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSizeController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = "sizes";
        $this->data['attributes'] = ['Id', 'Veličina', 'Jedinica mere'];
        $this->data['title'] = "Veličine";
    }
    public function index()
    {
        $this->data['data'] = Size::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }


    public function create()
    {
        return view('admin.createForms.size_add', $this->data);
    }


    public function store(AddSizeRequest $request)
    {
        try {
            Size::create([
                'size' => $request->input('size'),
                'measurementUnit' => $request->input('unit')
            ]);
            session()->put('success',"Uspešno dodavanje veličine!");
            return response()->redirectToRoute('sizes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno dodavanje veličine!");
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
            $this->data['size'] = Size::find($id);
            if($this->data['size'] == null)
            {
                return response()->redirectToRoute('sizes.index');
            }
            return view('admin.editForms.size_edit', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }


    public function update(EditSizeRequest $request, $id)
    {
        try {
            Size::where('id', $id)->update([
                'size' => $request->input('size'),
                'measurementUnit' => $request->input('unit'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->put('success',"Uspešna izmena veličine!");
            return response()->redirectToRoute('sizes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešna izmena veličine!");
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Size::where(["id" => $id])
                ->update(['deleted_at' => date('Y-m-d H:i:s')
                ]);
            session()->put('success',"Uspešno brisanje veličine!");
            return response()->redirectToRoute('sizes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno brisanje veličine!
             Proverite da li neki proizvod ima zadatu veličinu.");
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try {
            $this->data['deleted'] = Size::where('deleted_at', '<>', null)->get();
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
            Size::where("id", $id)->update(["deleted_at" => null]);
            session()->put('success',"Uspešno vraćanje veličine!");
            return response()->redirectToRoute('sizes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno vraćanje veličine!");
            return redirect()->back();
        }
    }
}
