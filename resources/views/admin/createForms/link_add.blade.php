@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Dodajte novi link</h2>
                    <form action="{{route($entity. ".store")}}" method="POST">
                        @CSRF
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="naziv">Naziv</label>
                                <input type="text" class="form-control" id="naziv" name="link" aria-describedby="emailHelp" placeholder="Naziv linka">
                            </div>
                            <div class="form-group">
                                <label for="path">Putanja linka</label>
                                <input type="text" class="form-control" id="path" name="linkpath" aria-describedby="emailHelp" placeholder="Adresa kuda link vodi...">
                            </div>
                            <div class="form-group">
                                <label for="priority">Prioritet linka</label>
                                <input type="number" class="form-control" id="priority" name="linkpriority" aria-describedby="emailHelp" placeholder="Prioritet u brojnom zapisu..">
                            </div>
                            <div class="form-group">
                                <label for="category"> Kategorija linka</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="0">Izaberite kategoriju linka.. </option>
                                    @foreach($menutype as $mt)
                                        @if($mt->type_name == "social links")
                                        <option value="{{$mt->id}}">{{$mt->type_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mx-auto">
                                <label>Ko sve može videti ovaj link?</label>
                                <table class="mx-auto">
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>
                                                {{$role->name}}
                                            </td>
                                            <td>
                                                <input type="checkbox" name="roles[]" value="{{$role->id}}"/>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <hr/>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(!empty(session()->get('success')))
                                <div class="alert-success">
                                    <p class="lead"> {{session()->pull('success')}} </p>
                                </div>
                            @elseif(!empty(session()->get('error')))
                                <div class="alert-danger">
                                    <p class="lead"> {{session()->pull('error')}} </p>
                                </div>
                            @endif
                            <input type="submit" class="btn colorform form-control text-gray-dark" value="Dodaj zapis"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
