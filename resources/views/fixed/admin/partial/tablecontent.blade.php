@if($entity == "users")
@foreach($data as $one)
    <tr>

        <th class="text-center" scope="row">{{$one->id}}</th>
        <td class="text-center">{{$one->name}}</td>
        <td class="text-center">{{$one->lastname}}</td>
        <td class="text-center">{{$one->email}}</td>

        @if($edit)
            <td class="text-center">
                <a class="btn btn-warning" href="{{route('users.edit',["user" => $one->id])}}" role="button">Edituj</a>
            </td>
            <td class="text-center">
                <form action="{{route('users.destroy',["user" => $one->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Obriši</button>
                </form>
            </td>
        @elseif(request()->routeIs('users.showDeleted'))
            <td class="text-center">
                {{$one->deleted_at}}
            </td>
            <td class="text-center">
                <form action="{{route('users.restoreDeleted', ['id' => $one->id])}}" method="post">
                    @csrf
                    <button class="btn btn-primary">Povrati</button>
                </form>
            </td>
        @endif
    </tr>
@endforeach
@elseif($entity == "products")
@foreach($data as $one)
    <tr >
        <th class="text-center" scope="row">{{$one->id}}</th>
        <td class="text-center">{{$one->name}}</td>
        @if($edit)
            <td class="text-center">
                <a class="btn btn-warning" href="{{route('products.edit',["product" => $one->id])}}" role="button">Edituj</a>
            </td>
            <td class="text-center">
                <form action="{{route('products.destroy',["product" => $one->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Obriši</button>
                </form>
            </td>
        @else
            <td class="text-center">
                {{$one->deleted_at}}
            </td>
            <td class="text-center">
                <form action="{{route('products.restoreDeleted', ['id' => $one->id])}}" method="post">
                    @csrf
                    <button class="btn btn-primary">Povrati</button>
                </form>
            </td>
        @endif
    </tr>
@endforeach
@elseif($entity == "notes")
        @foreach($data as $one)
        <tr >
            <th class="text-center" scope="row">{{$one->id}}</th>
            <td class="text-center">{{$one->name}}</td>
            @if($edit)
                <td class="text-center">
                    <a class="btn btn-warning" href="{{route('notes.edit',["note" => $one->id])}}" role="button">Edituj</a>
                </td>
                <td class="text-center">
                    <form action="{{route('notes.destroy',["note" => $one->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Obriši</button>
                    </form>
                </td>
            @else
                <td class="text-center">
                    {{$one->deleted_at}}
                </td>
                <td class="text-center">
                    <form action="{{route('notes.restoreDeleted', ['id' => $one->id])}}" method="post">
                        @csrf
                        <button class="btn btn-primary">Povrati</button>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach
@elseif($entity == "sizes")
    @foreach($data as $one)
        <tr >
            <th class="text-center" scope="row">{{$one->id}}</th>
            <td class="text-center">{{$one->size}}</td>
            <td class="text-center">{{$one->measurementUnit}}</td>
            @if($edit)
                <td class="text-center">
                    <a class="btn btn-warning" href="{{route('sizes.edit',["size" => $one->id])}}" role="button">Edituj</a>
                </td>
                <td class="text-center">
                    <form action="{{route('sizes.destroy',["size" => $one->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Obriši</button>
                    </form>
                </td>
            @else
                <td class="text-center">
                    {{$one->deleted_at}}
                </td>
                <td class="text-center">
                    <form action="{{route('sizes.restoreDeleted', ['id' => $one->id])}}" method="post">
                        @csrf
                        <button class="btn btn-primary">Povrati</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
@elseif($entity == "types")
    @foreach($data as $one)
        <tr >
            <th class="text-center" scope="row">{{$one->id}}</th>
            <td class="text-center">{{$one->type}}</td>
            @if($edit)
                <td class="text-center">
                    <a class="btn btn-warning" href="{{route('types.edit',["type" => $one->id])}}" role="button">Edituj</a>
                </td>
                <td class="text-center">
                    <form action="{{route('types.destroy',["type" => $one->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Obriši</button>
                    </form>
                </td>
            @else
                <td class="text-center">
                    {{$one->deleted_at}}
                </td>
                <td class="text-center">
                    <form action="{{route('types.restoreDeleted', ['id' => $one->id])}}" method="post">
                        @csrf
                        <button class="btn btn-primary">Povrati</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
@elseif($entity == "links")
    @foreach($data as $one)
        <tr >
            <th class="text-center" scope="row">{{$one->id}}</th>
            <td class="text-center">{{$one->route}}</td>
            <td class="text-center">{{$one->name}}</td>
            <td class="text-center">{{$one->order}}</td>
            @if($edit)
                <td class="text-center">
                    <a class="btn btn-warning" href="{{route('links.edit',["link" => $one->id])}}" role="button">Edituj</a>
                </td>
                <td class="text-center">
                    <form action="{{route('links.destroy',["link" => $one->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Obriši</button>
                    </form>
                </td>
            @else
                <td class="text-center">
                    {{$one->deleted_at}}
                </td>
                <td class="text-center">
                    <form action="{{route('links.restoreDeleted', ['id' => $one->id])}}" method="post">
                        @csrf
                        <button class="btn btn-primary">Povrati</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
@elseif($entity == "roles")
    @foreach($data as $one)
        <tr >
            <th class="text-center" scope="row">{{$one->id}}</th>
            <td class="text-center">{{$one->name}}</td>
            @if($edit)
                <td class="text-center">
                    <a class="btn btn-warning" href="{{route('roles.edit',["role" => $one->id])}}" role="button">Edituj</a>
                </td>
                <td class="text-center">
                    <form action="{{route('roles.destroy',["role" => $one->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Obriši</button>
                    </form>
                </td>
            @else
                <td class="text-center">
                    {{$one->deleted_at}}
                </td>
                <td class="text-center">
                    <form action="{{route('roles.restoreDeleted', ['id' => $one->id])}}" method="post">
                        @csrf
                        <button class="btn btn-primary">Povrati</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
@endif
