<footer class="footer layout_padding">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-md-4 col-sm-12 ">
                <div class="footer_link_heading">
                    <h3 class="text-center">Gde se nalazimo</h3>
                </div>
                <div class="address_infor ">
                    <p class="text-center mx-auto d-block">
                        <span class="icon"><img src="{{asset('assets/images/location_icon.png')}}" alt="#" /></span>
                        <span class="addrs">Pančevo</span>
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 text-center pb-3">
                <div class="footer_link_heading">
                    <h3 class="text-center">Posetite nas</h3>
                </div>
                <div class="social_icon text-center mx-auto">
                    <ul class="d-flex flex-column">
                        @foreach($social_links as $sl)
                            @if($sl->type->type_name == 'social links')
                            <li><a href="{{$sl->route}}" target="_blank" class="best m-3">{{$sl->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="footer_link_heading">
                    <h3 class="text-center">Pišite nam!</h3>
                </div>
                <div class="email_address_bottom text-center">
                    <img src="{{asset('assets/images/i2.png')}}" alt="#" /> <a class="text-white" href="#">temicandles@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</footer>
