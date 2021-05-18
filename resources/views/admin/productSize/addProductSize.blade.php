@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Dodajte veličinu zadatom proizvodu</h2>
                    <form action="{{route($entity. '.addProductSize')}}" method="POST">
                        @CSRF
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="product">Proizvod</label>
                                <select id="product" name="product" class="form-control">
                                    <option value="0">Izaberite proizvod kome dodajte veličinu..</option>
                                    @foreach($products as $one)
                                        <option value="{{$one->id}}"> {{$one->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="product">Veličina</label>
                                <select id="product" name="size" class="form-control">
                                    <option value="0">Izaberite veličinu koja se dodaje..</option>
                                    @foreach($sizes as $one)
                                        <option value="{{$one->id}}"> {{$one->size}}{{$one->measurementUnit}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cena">Cena</label>
                            <input type="number" class="form-control" id="cena" name="price" placeholder="Cena za zadatu veličinu u dinarima">
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
                        <input type="submit" class="btn colorform form-control text-gray-dark" value="Dodaj veličinu proizvodu"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
