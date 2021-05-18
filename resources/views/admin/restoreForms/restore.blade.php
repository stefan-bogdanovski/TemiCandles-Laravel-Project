@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="adminheader d-flex justify-content-around">
                                <h2>Povratite podatke: {{$title}}</h2>

                            </div>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    @if (count($deleted))
                                        @foreach($attributes as $attribute)
                                            <th scope="col"  class="text-center">{{$attribute}}</th>
                                        @endforeach
                                    @endif
                                </tr>
                                </thead>
                                @if (count($deleted))
                                    @component('fixed.admin.partial.tablecontent',
                                                [
                                                "data" => $deleted,
                                                "entity" => $entity,
                                                "edit" => false
                                                ])
                                    @endcomponent
                                @else
                                    <h1> Trenutno nema obrisanih podataka. </h1>
                                @endif
                            </table>
                            @if(!empty(session()->get('success')))
                                <div class="alert-success">
                                    <p class="lead"> {{session()->pull('success')}} </p>
                                </div>
                            @elseif(!empty(session()->get('error')))
                                <div class="alert-danger">
                                    <p class="lead"> {{session()->pull('error')}} </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
