@extends('layouts.layout')

@section('title')
    Mirišljave sveće - TemiCandles
@endsection
@section('keywords')
    Mirišljave, sveće, prodaja, temicandles
@endsection
@section('description')
    Pogledajte naš asortiman ručno rađenih mirišljavih parfemisanih sveća..
@endsection

@section('content')
    <div class="container pt-4 pb-4">
        <div class="row justify-content-center">
            <div class="col-9 col-sm-12 col-md-4 col-lg-3">
                <form>
                <input type="search" id="searchForProducts" class="form-control mb-3" placeholder="Pretraži sveće.."
                       value="{{app('request')->input('keyword')}}"
                       name="keyword"/>

                    <button type="submit" class="btn btn-danger mb-2 d-block mx-auto">Pretraži..</button>
                </form>
            </div>
            <div class="col-9 col-sm-12 col-md-8 col-lg-9">
                <div class="row pb-2" id="ProductWrapper">
                @if(count($products) != 0)
                    @foreach($products as $product)

                        @component('partials.one_product',[
                        "product" => $product,
                        "loop" => $loop])
                        @endcomponent
                    @endforeach
                @else
                    <div class="text-center mx-auto">
                        <p class="lead text-center"> Ne postoji proizvod sa zadatim kriterijumom. </p>
                    </div>
                @endif
                </div>
                {{ $products->links() }}
            </div>

        </div>
    </div>
@endsection
@if(session()->has('notLoggedIn'))
    <script type="text/javascript">
        alert("{{session()->pull('notLoggedIn')}}")
    </script>
@endif
