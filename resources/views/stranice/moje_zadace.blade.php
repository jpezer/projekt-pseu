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
                @foreach($userHomeworks as $userHomework)
                <tr>
                    <td>{{$userHomework->name}}</td>
                    <td>{{$userHomework->nazivStudija}}</td>
                    <td>{{$userHomework->naziv}}</td>
                    <td>{{$userHomework->opis}}</td>
                    <td>{{$userHomework->vrijeme_predaje}}</td>
                    <td>
                        <a href="{{route('stranice.preuzmi_zadacu', $userHomework->file_path) }}" download="{{$userHomework->file_path}}">Preuzmi</a> | 
                        <a href="{{route('stranice.izbrisi_zadacu', $userHomework->id)}}">Izbrisi</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection