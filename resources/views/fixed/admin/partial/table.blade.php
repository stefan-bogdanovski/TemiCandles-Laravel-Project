
<div class="main-panel pt-3" id="main-panel">

    <div class="content mt-0">
        <div class="row">
            <div class="col-12 col-lg-12 text-center">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="adminheader d-flex justify-content-around">
                            <h5 class="title mx-auto">{{$title}} </h5>
                            @if($entity == "products")
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <a href="{{route($entity . '.addProductSizeView')}}" class="mr-4"><button class="btn btn-info">Dodaj novu veličinu proizvodu</button></a>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <a href="{{route($entity . '.deleteProductSizeView')}}" class="mr-4"><button class="btn btn-info">Izbaci veličinu proizvodu</button></a>
                                    </div>

                            @endif
                            @if($edit)
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="{{route($entity . '.create')}}" class="mr-4"><button class="btn btn-info">Dodaj novi zapis</button></a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="{{route($entity . '.showDeleted')}}" class="mr-4"><button class="btn btn-warning">Povrati obrisan zapis</button></a>
                                        </div>
                            @endif
                            </div>
                        </div>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                @foreach($attributes as $attribute)
                                        <th scope="col"  class="text-center">{{$attribute}}</th>
                                @endforeach
                                @if($edit)
                                        <th scope="col"  class="text-center">Izmena</th>
                                        <th scope="col"  class="text-center">Brisanje</th>
                                @endif
                            </tr>
                            </thead>
                            @if (!empty($data))
                                @component('fixed.admin.partial.tablecontent',
                                            [
                                            "data" => $data,
                                            "entity" => $entity,
                                            "edit" => $edit
                                            ])
                                @endcomponent
                            @else
                                <h1> Trenutno nema podataka za prikaz. </h1>
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
