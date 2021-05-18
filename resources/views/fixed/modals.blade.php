<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto best" id="exampleModalLabel">Prijava</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('login')}}" method="POST">
                @CSRF
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Unesite email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lozinka</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Lozinka">
                    </div>
                   @if(session()->has('error_log_in'))
                       <h4 class="best"> {{ session()->pull('error_log_in') }}</h4>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn b-r bg-light" data-dismiss="modal">Zatvori</button>
                    <input type="submit" class="btn b-r bg-light" value="Prijavi se"/>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto best" id="exampleModalLabel">Registracija</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('register')}}" method="POST">
                    @CSRF
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputName">Ime</label>
                            <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="emailHelp" placeholder="Vaše ime">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlastName">Prezime</label>
                            <input type="text" class="form-control" id="exampleInputlastName" name="lastName" aria-describedby="emailHelp" placeholder="Vaše prezime">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1register">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1register" name="email" aria-describedby="emailHelp" placeholder="Unesite email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Lozinka</label>
                            <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Lozinka">
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
                    <div class="modal-footer">
                        <button type="button" class="btn b-r bg-light" data-dismiss="modal">Zatvori</button>
                        <input type="submit" class="btn b-r bg-light" value="Registruj se"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


