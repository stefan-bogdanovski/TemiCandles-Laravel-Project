<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto best" id="exampleModalLabel">{{session()->get('user')->email}} - Porudžbina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cart.purchase')}}" method="POST">
                    @CSRF
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputName">Način plaćanja</label>
                            <select class="form-control" id="payment" name="placanje">
                                <option value="0">Odaberite način plaćanja.. </option>
                                @foreach($payment_methods as $method)
                                <option value="{{$method->id}}">{{$method->payment_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="opstina">Opština</label>
                            <input type="text" class="form-control" id="opstina" name="opstina"  placeholder="Unesite opštinu">
                        </div>
                        <div class="form-group">
                            <label for="grad">Grad/Naselje</label>
                            <input type="text" class="form-control" id="grad" name="grad"  placeholder="Unesite grad ili naselje">
                        </div>
                        <div class="form-group">
                            <label for="adresa">Adresa</label>
                            <input type="text" class="form-control" id="adresa" name="adresa" placeholder="Unesite adresu za dostavu..">
                        </div>
                        <div class="form-group">
                            <label for="telefon">Broj telefona</label>
                            <input type="text" class="form-control" id="telefon" name="telefon" value="+381">
                        </div>
                        <p class="form-control">Troškovi dostave se plaćaju kurirsoj službi koja dostavlja robu. Rok isporuke je od 3 do 5 dana.
                        <span class="best font-weight-bold">Porudžbine iznosa preko 3000din imaju besplatnu dostavu.</span>
                        </p>
                        <input type="hidden" name="total" value="{{$total}}">
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
                    <div class="modal-footer">
                        <button type="button" class="btn b-r bg-light" data-dismiss="modal">Zatvori</button>
                        <input type="submit" class="btn b-r bg-light" value="Pošalji"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
