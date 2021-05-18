@extends('layouts.admin')
@section('adminContent')
    <div class="main-panel pt-3" id="main-panel">

        <div class="content mt-0">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-md-9 col-sm-12 text-center">
                    <h2>Izmenite proizvod: <span class="d-block colorhtag">{{$product->name}}</span></h2>
                    <form action="{{route($entity. ".update", $product->id)}}" method="POST" enctype="multipart/form-data">
                        @CSRF
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputName">Ime</label>
                                <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="emailHelp" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputlastName">Opis</label>
                                <input type="text" class="form-control" id="exampleInputlastName" name="opis" aria-describedby="emailHelp" value="{{$product->opis}}">
                            </div>
                            <div class="form-group">
                            <label for="tip">Tip sveće</label>
                            <select class="form-control" id="tip" name="type">
                                <option value="0">Odaberite tip sveće </option>
                                @foreach($types as $type)
                                    @php
                                        $exist = false;
                                    @endphp
                                    @foreach($product->types as $ptype)
                                        @if($ptype->id == $type->id && $ptype->deleted_at == null)
                                            @php
                                                $exist = true;
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    <option value="{{$type->id}}" {{$exist ? "selected" : ""}}>{{$type->type}}</option>
                                @endforeach
                            </select>
                            </div>
                            <label>Arome sveće</label>
                            <div class="form-group">
                            <table class="mx-auto">
                                @foreach($notes as $note)
                                    @php
                                        $exist = false;
                                    @endphp
                                    @foreach($product->notes as $pnote)
                                        @if($pnote->id == $note->id && $pnote->deleted_at == null)
                                            @php
                                                $exist = true;
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{$note->id}}" {{$exist ? "checked" : ""}} name="notes[]">
                                        </td>
                                        <td>
                                            {{$note->name}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label for="cena">Veličina sveće</label>
                                <select class="form-control" id="cena" name="size">
                                    <option value="">Odaberite veličinu </option>
                                    <?php $prvaIteracija = true; ?>
                                    @foreach($sizes as $size)
                                        @php
                                            $exist = false;
                                        @endphp
                                        @foreach($product->productsizes as $psize)
                                            @if($psize->size_id == $size->id && $psize->deleted_at == null)
                                                @php
                                                    $exist = true;
                                                @endphp
                                                <?php if($prvaIteracija): ?>
                                                    {{session()->put('prvaCena', $psize->price)}}
                                                    {{session()->put('prvaVelicina', true)}}
                                                    <?php $prvaIteracija = false; ?>
                                                <?php endif;?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if($exist)
                                            <option value="{{$size->id}}" @if(session()->has('prvaVelicina')) selected="selected" {{session()->remove('prvaVelicina')}} @endif>{{$size->size}}{{$size->measurementUnit}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <span class="text-muted">Napomena:</span><label for="cena" class="font-weight-bold">Cena se menja za odabranu veličinu</label>
                                    <input type="number" class="form-control" id="cena" name="price" value="{{session()->pull("prvaCena")}}" placeholder="Cena za zadatu veličinu u dinarima">
                                </div>
                            </div>
                            <div class="custom-file">
                                <label for="inputGroupFile01">Dodajte novu sliku</label>
                                <input type="file" name="slika" class="imagefile colorform form-control" id="inputGroupFile01">
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-6">
                                    <figure>
                                        <figcaption>Trenutna slika</figcaption>
                                        <img src="{{asset("storage/images/" . $image[0]->src)}}"/>
                                    </figure>
                                </div>
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
