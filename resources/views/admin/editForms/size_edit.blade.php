@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Izmenite veličinu: <span class="d-block colorhtag">{{$size->size}}{{$size->measurementUnit}}</span></h2>
                    <form action="{{route($entity. ".update", $size->id)}}" method="POST">
                        @CSRF
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputName">Veličina</label>
                                <input type="text" class="form-control" id="exampleInputName" name="size" aria-describedby="emailHelp" value="{{$size->size}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Merna jedinica</label>
                                <input type="text" class="form-control" id="exampleInputName2" name="unit" aria-describedby="emailHelp" value="{{$size->measurementUnit}}">
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
