<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo text-center">

        <a href="{{route('home')}}" class="simple-text logo-normal">
            Vrati se na sajt
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="{{route('admin')}}">

                    <p class="text-center">Ulogovani korisnici</p>
                </a>
            </li>
            <li>
                <a href="{{route('users.index')}}">

                    <p class="text-center">Korisnici</p>
                </a>
            </li>
            <li>
                <a href="{{route('products.index')}}">
                    <p class="text-center">Proizvodi</p>
                </a>
            </li>
            <li>
                <a href="{{route('notes.index')}}">
                    <p class="text-center">Arome</p>
                </a>
            </li>
            <li>
                <a href="{{route('sizes.index')}}">
                    <p class="text-center">Veličine</p>
                </a>
            </li>
            <li>
                <a href="{{route('types.index')}}">
                    <p class="text-center">Tipovi</p>
                </a>
            </li>
            <li>
                <a href="{{route('links.index')}}">
                    <p class="text-center">Linkovi</p>
                </a>
            </li>
            <li>
                <a href="{{route('roles.index')}}">
                    <p class="text-center">Uloge</p>
                </a>
            </li>
        </ul>
    </div>
</div>
