@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Dodajte novu sveću</h2>
                    <form action="{{route($entity. ".store")}}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="naziv">Naziv</label>
                                <input type="text" class="form-control" id="naziv" name="name" aria-describedby="emailHelp" placeholder="Naziv proizvoda">
                            </div>
                            <div class="form-group">
                                <label for="opis">Opis</label>
                                <input type="text" class="form-control" id="opis" name="opis" placeholder="Opis proizvoda">
                            </div>
                            <div class="form-group">
                                <label for="velicine">Veličina sveće</label>
                                <select class="form-control" id="velicine" name="size">
                                    <option value="0">Izaberite velicinu proizvoda </option>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->size}}{{$size->measurementUnit}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tip"> Tip sveće</label>
                                <select class="form-control" id="tip" name="type">
                                    <option value="0">Izaberite tip sveće </option>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Arome</label>
                                </br>
                                <table class="mx-auto">
                                    @foreach($notes as $note)
                                        <tr>
                                            <td>
                                                <input type="checkbox" value="{{$note->id}}" name="notes[]">
                                            </td>
                                            <td>
                                                {{$note->name}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="cena">Cena</label>
                                <input type="number" class="form-control" id="cena" name="price" placeholder="Cena za zadatu veličinu u dinarima">
                            </div>
                            <div class="custom-file">
                                <label for="inputGroupFile01">Dodaj sliku</label>
                                <input type="file" name="slika" class="imagefile colorform form-control" id="inputGroupFile01">
                            </div>
                        </div>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
