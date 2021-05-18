@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Dodajte novi tip</h2>
                    <form action="{{route($entity. ".store")}}" method="POST">
                        @CSRF
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="naziv">Naziv</label>
                                <input type="text" class="form-control" id="naziv" name="type" aria-describedby="emailHelp" placeholder="Naziv tipa">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
