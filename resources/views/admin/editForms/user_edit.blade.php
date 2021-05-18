@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Izmenite korisnika {{$userToEdit->name}} {{$userToEdit->lastname}}</h2>
                    <form action="{{route($entity. ".update", $userToEdit->id)}}" method="POST">
                        @CSRF
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputName">Ime</label>
                                <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="emailHelp" value="{{$userToEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputlastName">Prezime</label>
                                <input type="text" class="form-control" id="exampleInputlastName" name="lastName" aria-describedby="emailHelp" value="{{$userToEdit->lastname}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1register">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1register" name="email" aria-describedby="emailHelp" value="{{$userToEdit->email}}">
                            </div>
                            <div class="form-group">
                                <label>Uloga</label>
                                </br>
                                @foreach($roles as $role)
                                   @if($role->name != "Guest")
                                   @php
                                   $exist = false;
                                   @endphp
                                   @foreach($userRoles as $ur)
                                       @if($ur->id == $role->id)
                                           @php $exist = true; @endphp
                                           @break
                                       @endif
                                   @endforeach
                                   {{$role->name}}<input type="checkbox" name="roles[]" value="{{$role->id}}" {{$exist ? "checked" : ""}}/>
                                    </br>
                                   @endif
                                @endforeach
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
                        <input type="submit" class="btn colorform form-control text-gray-dark" value="Izmeni zapis"/>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
