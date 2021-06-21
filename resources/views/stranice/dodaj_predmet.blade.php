
@extends('stranice.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Novi predmet</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('stranice.pregled_predmeta')}}" class="btn btn-danger">Vrati se</a>
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

                            <form action="{{route('stranice.spremi_predmet')}}" method="POST">
                                @csrf <!-- Svaka forma mora imati CSRF token! -->
                                
                                <div class="form-group">
                                    <label for="naziv">Odaberi studij</label>
                                    <select class="form-control" name="studij">
                                        @foreach($studiji as $studij)
                                            <option value="{{$studij->id}}">{{$studij->nazivStudija}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="naziv">Naziv *</label>
                                    <input name="naziv" type="text" class="form-control" placeholder="Unesi naziv.. *">
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
