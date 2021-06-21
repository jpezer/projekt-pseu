
@extends('stranice.okvir')

@section('sadrzaj')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="margin-top: 5px;">Nova zadaca</h3>
                            </div>
                            <div class="col-md-3"  style="text-align: right;">
                                <a href="{{route('stranice.moje_zadace')}}" class="btn btn-danger">Vrati se</a>
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
                           
                            <form action="{{route('stranice.spremi_zadacu')}}" method="post" enctype="multipart/form-data"">
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
                                    <label for="naziv">Odaberi predmet</label>
                                    <select class="form-control" name="predmet">
                                        @foreach($predmeti as $predmet)
                                            <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            
                                <div class="form-group">
                                    <label for="opis">Opis</label>
                                    <input name="opis" type="text" class="form-control" placeholder="Unesite opis">
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                    <label class="custom-file-label" for="chooseFile">Odaberite zadacu</label>
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-top:15px;">Spremi</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
