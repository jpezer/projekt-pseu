@extends('stranice.okvir')

@section('sadrzaj')
    <div class="row">
        <div class="col-md-9">
            <h1>Zadace</h1>
        </div>

    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>Korisnik</th>
                    <th>Studij</th>
                    <th>Predmet</th>
                    <th>Opis</th>
                    <th>Vrijeme predaje</th>
                    <th>Akcija</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->nazivStudija}}</td>
                    <td>{{$d->naziv}}</td>
                    <td>{{$d->opis}}</td>
                    <td>{{$d->vrijeme_predaje}}</td>
                    <td>
                        <a href="{{route('stranice.preuzmi_zadacu', $d->file_path) }}" download="{{$d->file_path}}">Preuzmi</a> | 
                        <a href="{{route('stranice.izbrisi_zadacu', $d->id)}}">Izbrisi</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection