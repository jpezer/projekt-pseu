@extends('stranice.okvir')

@section('sadrzaj')
    <div class="row">
        <div class="col-md-9">
            <h1>Studiji</h1>
        </div>

        <div class="col-md-3" style="text-align:right;">
            <a href="{{route('stranice.dodaj_studij')}}" class="btn btn-primary">Novi studij</a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <th>Akcije</th>
                </tr>

                @foreach($studiji as $studij)
                    <tr>
                        <td>{{$studij->nazivStudija}}</td>
                        <td>{{$studij->opis}}</td>
                        <td><a href="{{route('stranice.uredi_studij', $studij->id) }}">Uredi</a> | <a href="{{route('stranice.izbrisi_studij', $studij->id)}}">Izbrisi</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection