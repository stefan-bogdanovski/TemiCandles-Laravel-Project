<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNoteRequest;
use App\Http\Requests\EditNoteRequest;
use App\Models\Note;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminNoteController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = 'notes';
        $this->data['attributes'] = ['Id', 'Ime'];
        $this->data['title'] = 'Arome';
    }

    public function index()
    {
        $this->data['data'] = Note::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }

    public function create()
    {
        return view('admin.createForms.note_add', $this->data);
    }


    public function store(AddNoteRequest $request)
    {
        try {
            $name = $request->input('name');
            Note::create([
                "name" => $name
            ]);
            session()->put('success',"Uspešno dodavanje arome!");
            return response()->redirectToRoute('notes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno dodavanje arome!");
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
            $this->data['note'] = Note::find($id);
            if($this->data['note'] == null)
            {
                return response()->redirectToRoute('notes.index');
            }
            return view('admin.editForms.note_edit', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }


    public function update(EditNoteRequest $request, $id)
    {
        $name = $request->input('name');
        try {
            Note::where('id', $id)->update([
                'name' => $name,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->put('success',"Uspešna izmena arome!");
            return response()->redirectToRoute('notes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešna izmena naziva arome!");
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            Note::where(["id" => $id])
                ->update(['deleted_at' => date('Y-m-d H:i:s')
            ]);
            session()->put('success',"Uspešno brisanje arome!");
            return response()->redirectToRoute('notes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error',"Neuspešno brisanje arome!");
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try {
            $this->data['deleted'] = Note::where('deleted_at', '<>', null)->get();
            array_push($this->data['attributes'], 'Datum brisanja');
            array_push($this->data['attributes'], 'Povrati');
            return view('admin.restoreForms.restore', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function restoreDeleted($id)
    {
        try {
            Note::where("id", $id)->update(["deleted_at" => null]);
            session()->put('success',"Uspešno vraćanje proizvoda!");
            return response()->redirectToRoute('notes.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno vraćanje proizvoda!");
            return redirect()->back();
        }
    }
}
