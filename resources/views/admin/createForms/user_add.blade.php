@extends('layouts.admin')
@section('adminContent')
<div class="main-panel pt-3" id="main-panel">

    <div class="content mt-0">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                <h2>Unesite novog korisnika</h2>
                <form action="{{route($entity. ".store")}}" method="POST">
                    @CSRF
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputName">Ime</label>
                            <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="emailHelp" placeholder="Korisničko ime">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlastName">Prezime</label>
                            <input type="text" class="form-control" id="exampleInputlastName" name="lastName" aria-describedby="emailHelp" placeholder="Korisničko prezime">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1register">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1register" name="email" aria-describedby="emailHelp" placeholder="Email korisnika">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Lozinka</label>
                            <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Korisnička lozinka">
                        </div>
                        <div class="form-group">
                            <label for="userrole">Uloga</label>
                            <select id="userrole" name="role" class="form-control">
                                <option value="0">Izaberite ulogu korisnika..</option>
                                @foreach($roles as $role)
                                    @if($role->name != "Guest")
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
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
