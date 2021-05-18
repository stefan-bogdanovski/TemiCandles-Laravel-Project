@extends('layouts.layout')

@section('title')
    Korpa - TemiCandles
@endsection
@section('keywords')
    Poručite vaše omiljene, temicandles sveće!
@endsection
@section('description')
    Ova stranica omogućava dodavanje sveća u korpu korisnika.
@endsection
@section('content')
    @if(!empty(session()->get('success')))
       <script type="text/javascript">
             alert('{{session()->pull('success')}}');
        </script>
    @elseif(!empty(session()->get('error')))
        <script type="text/javascript">
            alert('{{session()->pull('error')}}');
        </script>
    @endif
    <div class="container mb-5 mt-4">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="best">{{count($productsInBasket) ? "Vaša korpa" : "Vaša korpa je trenutno prazna." }}  </h2>
            </div>
        </div>
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Sveća</th>
                                <th scope="col" width="120">Količina</th>
                                <th scope="col" width="120">Cena</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productsInBasket as $one)
                                @component('partials.one_product_in_basket', ['one' => $one])
                                @endcomponent
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Sve ukupno:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>{{$total}}din</strong></dd>
                        </dl>
                        <hr>
                        <a href="#" class="btn btn-out backbest btn-square btn-main {{count($productsInBasket) ? "" : "disabled"}}"
                           data-toggle="modal" data-target="#exampleModal3" data-abc="true"> Poruči </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
