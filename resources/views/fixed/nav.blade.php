<div class="header_bottom_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 mb-2">
                <div class="full ">
                    <div class="main_menu">
                        <nav class="navbar navbar-inverse navbar-toggleable-md">
                            <button class="navbar-toggler b-r" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="float-left">Menu</span>
                                <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                                <ul class="navbar-nav">
                                    @foreach($menuLinks as $links)
                                        @foreach($links->roles as $one)
                                            @if($links->type->type_name == "website links")
                                                @if(session()->has('user'))
                                                    @if(session()->get('user')->roles->Min('id') == $one->pivot->role_id)
                                                        <li class="nav-item b-r {{request()->routeIs($links->route) ? "active" : ""}} ">
                                                            <a class="nav-link"
                                                               href="{{$links->route == "#" ? "#" : route($links->route)}}"
                                                            >
                                                                {{$links->name}}

                                                            </a>
                                                        </li>
                                                    @endif
                                                @else
                                                    @if(3 == $one->pivot->role_id)
                                                        <li class="nav-item b-r {{request()->routeIs($links->route) ? "active" : ""}} ">
                                                            <a class="nav-link"
                                                               href="{{$links->route == "#" ? "#" : route($links->route)}}"
                                                               @if($links->name == "Prijavi se")
                                                                data-toggle="modal"
                                                                data-target="#exampleModal"
                                                               @endif
                                                               @if($links->name == "Registruj se")
                                                               data-toggle="modal"
                                                               data-target="#exampleModal2"
                                                               @endif
                                                            >
                                                                {{$links->name}}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endif
                                            @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('fixed.modals')
