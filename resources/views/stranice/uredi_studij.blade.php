
@extends('stranice.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Uredi studij</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('stranice.pregled_studija')}}" class="btn btn-danger">Vrati se</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">

                            <form action="{{route('stranice.uredi_studij', $studij->id) }}" method="POST">
                                @csrf <!-- Svaka forma mora imati CSRF token! -->

                                <div class="form-group">
                                    <label for="naziv">Naziv *</label>
                                    <input name="naziv" type="text" class="form-control" placeholder="Unesi naziv.. *" value="{{$studij->naziv}}">
                                </div>

                                <div class="form-group">
                                    <label for="opsi">Opis *</label>
                                    <input name="opis" type="text" class="form-control" placeholder="Unesi opis.. *" value="{{$studij->opis}}">
                                </div>

                                <button type="submit" class="btn btn-primary">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
