<tr>
    <td>
        <figure class="itemside align-items-center">
            <div class="aside"><img src="{{asset('storage/images/' . $one->product->products->images[0]->src)}}" alt="Slika sveće {{$one->product->products->name}}" class="img-sm"></div>
            <figcaption class="info"> <span  class="best title text-dark" data-abc="true">{{$one->product->products->name}}</span>
                <p class="text-muted small">{{$one->product->sizes->size}}{{$one->product->sizes->measurementUnit}}</p>
            </figcaption>
        </figure>
    </td>
    <td>
        <p> {{$one->quantity}} </p>
    <td>
        <div class="price-wrap"> <var class="price">{{$one->product->price * $one->quantity}}din</var> <small class="text-muted"> {{$one->product->price}}din  x {{$one->quantity}}</small> </div>
    </td>
    <td class="text-right d-none d-md-block">
        <a href="#" class="backbest btn btn-light mr-4 delete" id="{{$one->id}}"> Obriši</a>
    </td>
</tr>
