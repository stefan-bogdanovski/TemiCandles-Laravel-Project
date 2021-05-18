@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Izmenite link: <span class="d-block colorhtag">{{$link->name}}</span></h2>
                    <form action="{{route($entity. ".update", $link->id)}}" method="POST">
                        @CSRF
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="naziv">Naziv</label>
                                <input type="text" class="form-control" id="naziv" name="link" aria-describedby="emailHelp" value="{{$link->name}}">
                            </div>
                            <div class="form-group">
                                <label for="path">Putanja linka</label>
                                <input type="text" class="form-control" id="path" name="linkpath" aria-describedby="emailHelp" value="{{$link->route}}">
                            </div>
                            <div class="form-group">
                                <label for="priority">Prioritet linka</label>
                                <input type="number" class="form-control" id="priority" name="linkpriority" aria-describedby="emailHelp" value="{{$link->order}}">
                            </div>
                            <div class="form-group">
                                <label for="category"> Kategorija linka</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="0">Izaberite kategoriju linka.. </option>
                                    @foreach($menutype as $mt)
                                        <option value="{{$mt->id}}">{{$mt->type_name}}</option>
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
                                            @php
                                                $exist = false;
                                            @endphp
                                            @foreach($link->roles as $lr)
                                                @if($role->id == $lr->id)
                                                    @php $exist = true; @endphp
                                                    @break
                                                @endif
                                            @endforeach
                                            <td>
                                                <input type="checkbox" name="roles[]" {{$exist ? "checked" : ""}} value="{{$role->id}}"/>
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
