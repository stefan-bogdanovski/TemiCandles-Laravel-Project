<div class="col-lg-4 col-md-6 col-sm-12 pb-3">

    <div class="card">
        <img class="card-img" src="{{asset("storage/images/" . $product->src)}}"
             alt="{{$product->name}}"/>

        <div class="card-body">
            <h4 class="card-title text-center"><strong>{{$product->name}}</strong></h4>
            <h6 class="card-subtitle mb-2 text-muted text-center">
                <label class="form-check-label mr-4" for="{{$product->id}}">
                    Veličina
                </label>
                <select id="product_size{{$product->id}}" data-productid="{{$product->id}}" class="form-control form-control-sm text-center">
                    @foreach($product->productsizes as $size)
                        @if($loop->first)
                            <option value="{{$size->sizes->id}}" selected>{{$size->sizes->size}}{{$size->sizes->measurementUnit}}</option>
                        @else
                            <option value="{{$size->sizes->id}}">{{$size->sizes->size}}{{$size->sizes->measurementUnit}}</option>
                        @endif
                    @endforeach

                </select>

            </h6>

            <p class="card-text text-justify last"> {{$product->opis }}</p>
            <p class="card-text text-muted"> Arome:
                @foreach($product->available_notes as $note)
                    @if(!$loop->last)
                        {{$note->name . ', '}}
                    @else
                        {{$note->name}}
                    @endif
                @endforeach
            </p>
            <div class="price text-success">
                <h5 class="mt-4 text-center">
                    <p class="text-center text-muted" id="cena{{$product->id}}">
                        @foreach($product->productsizes as $size)
                            @if($loop->first)
                                Cena: {{$size->price}}din
                            @endif
                        @endforeach
                    </p>
                </h5>
            </div>
                <div class="buy d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-danger mt-3 cart" id="{{$product->id}}"> Dodaj u korpu</a>
                </div>
        </div>
    </div>
</div>
