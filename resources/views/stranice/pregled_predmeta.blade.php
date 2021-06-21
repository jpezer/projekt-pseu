@extends('stranice.okvir')

@section('sadrzaj')
    <div class="row">
        <div class="col-md-9">
            <h1>Predmeti</h1>
        </div>

        <div class="col-md-3" style="text-align:right;">
            <a href="{{route('stranice.dodaj_predmet')}}" class="btn btn-primary">Novi predmet</a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>Naziv</th>
                    <th>Akcija</th>
                </tr>

                @foreach($predmeti as $predmet)
                    <tr>
                        <td>{{$predmet->naziv}}</td>
                        <td><a href="{{route('stranice.uredi_predmet',$predmet->id)}}">Uredi</a> | 
                            <a href="{{route('stranice.izbrisi_predmet',$predmet->id)}}">Izbrisi</a>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection